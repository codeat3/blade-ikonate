<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeIkonate\BladeIkonateServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('ik-sun-cloud')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
<svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-labelledby="sunCloudIconTitle" fill="currentColor">
    <title id="sunCloudIconTitle">Sun with clouds</title>    
    <path d="M6.41666667,18 C4.34559885,18 2.66666667,16.3210678 2.66666667,14.25 C2.66666667,12.1789322 4.34559885,10.5 6.41666667,10.5 C6.76623742,10.5 7.1046365,10.5478316 7.42567619,10.637307 C8.268975,9.06740907 9.92650079,8 11.8333333,8 C14.3181251,8 16.3795773,9.81253245 16.7676626,12.1875701 C18.212994,12.3609238 19.3333333,13.5912939 19.3333333,15.0833333 C19.3333333,16.6941639 18.0274972,18 16.4166667,18 L6.41666667,18 Z"/>
    <path stroke-linecap="butt" d="M18.0340876,12.8316143 C18.7745078,12.6093095 19.4246189,12.178252 19.916054,11.6068088 C20.518149,10.9066896 20.882062,9.99584299 20.882062,9 C20.882062,6.790861 19.091201,5 16.882062,5 C15.8786813,5 14.9615886,5.36944286 14.2593915,5.97972096 C13.6491793,6.51005521 13.2012494,7.22226063 13,8.03193915"/>
</svg>
SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('ik-sun-cloud', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
<svg class="w-6 h-6 text-gray-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-labelledby="sunCloudIconTitle" fill="currentColor">
    <title id="sunCloudIconTitle">Sun with clouds</title>    
    <path d="M6.41666667,18 C4.34559885,18 2.66666667,16.3210678 2.66666667,14.25 C2.66666667,12.1789322 4.34559885,10.5 6.41666667,10.5 C6.76623742,10.5 7.1046365,10.5478316 7.42567619,10.637307 C8.268975,9.06740907 9.92650079,8 11.8333333,8 C14.3181251,8 16.3795773,9.81253245 16.7676626,12.1875701 C18.212994,12.3609238 19.3333333,13.5912939 19.3333333,15.0833333 C19.3333333,16.6941639 18.0274972,18 16.4166667,18 L6.41666667,18 Z"/>
    <path stroke-linecap="butt" d="M18.0340876,12.8316143 C18.7745078,12.6093095 19.4246189,12.178252 19.916054,11.6068088 C20.518149,10.9066896 20.882062,9.99584299 20.882062,9 C20.882062,6.790861 19.091201,5 16.882062,5 C15.8786813,5 14.9615886,5.36944286 14.2593915,5.97972096 C13.6491793,6.51005521 13.2012494,7.22226063 13,8.03193915"/>
</svg>
SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('ik-sun-cloud', ['style' => 'color: #555'])->toHtml();

        
        $expected = <<<'SVG'
<svg style="color: #555" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-labelledby="sunCloudIconTitle" fill="currentColor">
    <title id="sunCloudIconTitle">Sun with clouds</title>    
    <path d="M6.41666667,18 C4.34559885,18 2.66666667,16.3210678 2.66666667,14.25 C2.66666667,12.1789322 4.34559885,10.5 6.41666667,10.5 C6.76623742,10.5 7.1046365,10.5478316 7.42567619,10.637307 C8.268975,9.06740907 9.92650079,8 11.8333333,8 C14.3181251,8 16.3795773,9.81253245 16.7676626,12.1875701 C18.212994,12.3609238 19.3333333,13.5912939 19.3333333,15.0833333 C19.3333333,16.6941639 18.0274972,18 16.4166667,18 L6.41666667,18 Z"/>
    <path stroke-linecap="butt" d="M18.0340876,12.8316143 C18.7745078,12.6093095 19.4246189,12.178252 19.916054,11.6068088 C20.518149,10.9066896 20.882062,9.99584299 20.882062,9 C20.882062,6.790861 19.091201,5 16.882062,5 C15.8786813,5 14.9615886,5.36944286 14.2593915,5.97972096 C13.6491793,6.51005521 13.2012494,7.22226063 13,8.03193915"/>
</svg>
SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeIkonateServiceProvider::class,
        ];
    }
}
