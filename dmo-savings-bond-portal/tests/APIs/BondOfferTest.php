<?php

namespace Tests\APIs;

use DMO\SavingsBond\Events\OfferCreated;
use DMO\SavingsBond\Events\OfferDeleted;
use DMO\SavingsBond\Events\OfferUpdated;
use DMO\SavingsBond\Listeners\OfferCreatedListener;
use DMO\SavingsBond\Listeners\OfferDeletedListener;
use DMO\SavingsBond\Listeners\OfferUpdatedListener;
use DMO\SavingsBond\Models\Offer;
use Hasob\FoundationCore\Models\Organization;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BondOfferTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    /**
     * @var
     */
    private $offer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->offer = Offer::factory()->create();
    }

    /** @test */
    public function it_retrieves_all_bond_offer_records()
    {
        $this->getJson(route('sb-api.offers.index'))
        ->assertOk()
        ->assertJsonStructure([
            "success",
            "data" => [
                '0' => [
                    'id',
                    'organization_id',
                    'created_at',
                    'updated_at',
                ],
            ],
            "message"
        ]);
    }

    /** @test */
    public function it_create_bond_offers()
    {
        Event::fake([OfferCreated::class]);

        $form = [
            'display_ordinal' => $this->faker->randomDigitNotNull,
            'status' => $this->faker->word,
            'wf_status' => $this->faker->word,
            'wf_meta_data' => $this->faker->text,
            'offer_title' => $this->faker->email,
            'price_per_unit' => $this->faker->randomFloat('2'),
            'max_units_per_investor' => $this->faker->randomDigitNotNull,
            'interest_rate_pct' => $this->faker->randomFloat('2', 0, 2),
            'offer_start_date' => $this->faker->date('Y-m-d H:i:s'),
            'offer_end_date' => $this->faker->date('Y-m-d H:i:s'),
            'offer_settlement_date' => $this->faker->date('Y-m-d H:i:s'),
            'offer_maturity_date' => $this->faker->date('Y-m-d H:i:s'),
            'tenor_years' => $this->faker->randomDigitNotNull,
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
            'organization_id' => Organization::first()->id
        ];

        $this->postJson(route('sb-api.offers.store'), $form)
            ->assertOk();

        $offer = Offer::where("offer_title", $form['offer_title'])->first();

        $this->assertDatabaseCount('sb_offers', 2);

        $this->assertDatabaseHas('sb_offers', [
            'id' => $offer->id,
            'status' => $form['status'],
            'offer_title' => $form['offer_title'],
            'tenor_years' => $form['tenor_years'],
            'organization_id' => $form['organization_id'],
            'created_at' => $form['created_at'],
            'updated_at' => $form['updated_at'],
        ]);

        /*to test it dispatch event and listener*/
        Event::assertDispatched(OfferCreated::class);

        Event::assertListening(OfferCreated::class, OfferCreatedListener::class);
    }

    /** @test */
    public function it_update_a_bond_offer_record()
    {
        Event::fake([OfferUpdated::class]);

        $form = [
            'organization_id' => $this->offer->organization_id,
            'offer_title' => $this->offer->offer_title,
            'price_per_unit' => $this->faker->randomFloat('2'),
            'max_units_per_investor' => $this->faker->randomDigitNotNull,
            'interest_rate_pct' => $this->faker->randomFloat('2', 0, 2),
            'offer_maturity_date' => $this->faker->date('Y-m-d H:i:s'),
            'tenor_years' => $this->faker->randomDigitNotNull,
            'offer_start_date' => now()->format('Y-m-d H:i:s'),
            'offer_end_date' => now()->addMonths(2)->format('Y-m-d H:i:s'),
            'offer_settlement_date' => now()->addMonths(2)->format('Y-m-d H:i:s'),
        ];

        $this->patchJson(route('sb-api.offers.update', $this->offer->id), $form)
            ->assertOk();

        $this->assertDatabaseHas('sb_offers', [
            'id' => $this->offer->id,
            'organization_id' => $form['organization_id'],
            'offer_title' => $form['offer_title'],
            'tenor_years' => $form['tenor_years'],
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);

        /*to test it dispatch event and listener*/
        Event::assertDispatched(OfferUpdated::class);

        Event::assertListening(OfferUpdated::class, OfferUpdatedListener::class);
    }

    /** @test */
    public function it_delete_a_bond_offer_record()
    {
        Event::fake([OfferDeleted::class]);

        $this->deleteJson(route('sb-api.offers.destroy', $this->offer->id))
            ->assertOk();

        $offer = Offer::where("id", $this->offer->id)->count();

        $this->assertSoftDeleted($this->offer);

        $this->assertEquals(0, $offer);

        /*to test it dispatch event and listener*/
        Event::assertDispatched(OfferDeleted::class);

        Event::assertListening(OfferDeleted::class, OfferDeletedListener::class);
    }

    /** @test */
    public function a_bond_offer_belongs_to_an_organization()
    {
        $this->assertTrue($this->offer->organization()->exists());

        $this->assertEquals(1, $this->offer->organization()->count());

        $this->assertInstanceOf(Organization::class, $this->offer->organization);
    }
}
