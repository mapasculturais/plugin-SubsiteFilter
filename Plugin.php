<?php
namespace SubsiteFilter;

use MapasCulturais\App;
use MapasCulturais\API;
use MapasCulturais\Plugin as MapasPlugin;
class Plugin extends MapasPlugin{
    function _init()
    {
        $app = App::i();
        $app->hook("ApiQuery(<<project|opportunity|agent|space|event|registration>>).params", function(&$api_params) use($app) {
            if($subsite = $app->subsite){
                $api_params['_subsiteId'] = API::EQ($subsite->id);
            }
        });
    }

    function register() {}
}
