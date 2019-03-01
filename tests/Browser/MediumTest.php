<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class MediumTest extends DuskTestCase
{

    public function testCreateMedium()
    {
        $admin = \App\User::find(1);
        $medium = factory('App\Medium')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $medium) {
            $browser->loginAs($admin)
                ->visit(route('admin.media.index'))
                ->clickLink('Add new')
                ->type("model_type", $medium->model_type)
                ->type("model_id", $medium->model_id)
                ->type("collection_name", $medium->collection_name)
                ->type("name", $medium->name)
                ->type("file_name", $medium->file_name)
                ->type("disk", $medium->disk)
                ->type("mime_type", $medium->mime_type)
                ->type("size", $medium->size)
                ->type("manipulations", $medium->manipulations)
                ->type("custom_properties", $medium->custom_properties)
                ->type("responsive_images", $medium->responsive_images)
                ->type("order_column", $medium->order_column)
                ->press('Save')
                ->assertRouteIs('admin.media.index')
                ->assertSeeIn("tr:last-child td[field-key='model_type']", $medium->model_type)
                ->assertSeeIn("tr:last-child td[field-key='model_id']", $medium->model_id)
                ->assertSeeIn("tr:last-child td[field-key='collection_name']", $medium->collection_name)
                ->assertSeeIn("tr:last-child td[field-key='name']", $medium->name)
                ->assertSeeIn("tr:last-child td[field-key='file_name']", $medium->file_name)
                ->assertSeeIn("tr:last-child td[field-key='disk']", $medium->disk)
                ->assertSeeIn("tr:last-child td[field-key='mime_type']", $medium->mime_type)
                ->assertSeeIn("tr:last-child td[field-key='size']", $medium->size)
                ->assertSeeIn("tr:last-child td[field-key='manipulations']", $medium->manipulations)
                ->assertSeeIn("tr:last-child td[field-key='custom_properties']", $medium->custom_properties)
                ->assertSeeIn("tr:last-child td[field-key='responsive_images']", $medium->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='order_column']", $medium->order_column)
                ->logout();
        });
    }

    public function testEditMedium()
    {
        $admin = \App\User::find(1);
        $medium = factory('App\Medium')->create();
        $medium2 = factory('App\Medium')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $medium, $medium2) {
            $browser->loginAs($admin)
                ->visit(route('admin.media.index'))
                ->click('tr[data-entry-id="' . $medium->id . '"] .btn-info')
                ->type("model_type", $medium2->model_type)
                ->type("model_id", $medium2->model_id)
                ->type("collection_name", $medium2->collection_name)
                ->type("name", $medium2->name)
                ->type("file_name", $medium2->file_name)
                ->type("disk", $medium2->disk)
                ->type("mime_type", $medium2->mime_type)
                ->type("size", $medium2->size)
                ->type("manipulations", $medium2->manipulations)
                ->type("custom_properties", $medium2->custom_properties)
                ->type("responsive_images", $medium2->responsive_images)
                ->type("order_column", $medium2->order_column)
                ->press('Update')
                ->assertRouteIs('admin.media.index')
                ->assertSeeIn("tr:last-child td[field-key='model_type']", $medium2->model_type)
                ->assertSeeIn("tr:last-child td[field-key='model_id']", $medium2->model_id)
                ->assertSeeIn("tr:last-child td[field-key='collection_name']", $medium2->collection_name)
                ->assertSeeIn("tr:last-child td[field-key='name']", $medium2->name)
                ->assertSeeIn("tr:last-child td[field-key='file_name']", $medium2->file_name)
                ->assertSeeIn("tr:last-child td[field-key='disk']", $medium2->disk)
                ->assertSeeIn("tr:last-child td[field-key='mime_type']", $medium2->mime_type)
                ->assertSeeIn("tr:last-child td[field-key='size']", $medium2->size)
                ->assertSeeIn("tr:last-child td[field-key='manipulations']", $medium2->manipulations)
                ->assertSeeIn("tr:last-child td[field-key='custom_properties']", $medium2->custom_properties)
                ->assertSeeIn("tr:last-child td[field-key='responsive_images']", $medium2->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='order_column']", $medium2->order_column)
                ->logout();
        });
    }

    public function testShowMedium()
    {
        $admin = \App\User::find(1);
        $medium = factory('App\Medium')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $medium) {
            $browser->loginAs($admin)
                ->visit(route('admin.media.index'))
                ->click('tr[data-entry-id="' . $medium->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='model_type']", $medium->model_type)
                ->assertSeeIn("td[field-key='model_id']", $medium->model_id)
                ->assertSeeIn("td[field-key='collection_name']", $medium->collection_name)
                ->assertSeeIn("td[field-key='name']", $medium->name)
                ->assertSeeIn("td[field-key='file_name']", $medium->file_name)
                ->assertSeeIn("td[field-key='disk']", $medium->disk)
                ->assertSeeIn("td[field-key='mime_type']", $medium->mime_type)
                ->assertSeeIn("td[field-key='size']", $medium->size)
                ->assertSeeIn("td[field-key='manipulations']", $medium->manipulations)
                ->assertSeeIn("td[field-key='custom_properties']", $medium->custom_properties)
                ->assertSeeIn("td[field-key='responsive_images']", $medium->responsive_images)
                ->assertSeeIn("td[field-key='order_column']", $medium->order_column)
                ->logout();
        });
    }

}
