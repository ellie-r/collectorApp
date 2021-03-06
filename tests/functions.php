<?php

require '../functions.php';
use PHPUnit\Framework\TestCase;
class Functions extends TestCase {
    public function testSuccessAddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => 'oaky afterbirth', 'cost' => '7.99',
                    'nameOfBrand' => 'generic name', 'region' => 'australia', 'img_location' => 'folder/file.png']];
        $expectedOutput = '<div class = "itemContainer">
                <h2>Variety: merlot</h2>
                <p>Brand: generic name</p>
                <p>Cost: £7.99</p>
                <p>Region of Origin: australia</p>
                <p>Tones: oaky afterbirth</p>
                <div class="itemImg">
                    <img src="folder/file.png" alt="image of wine">
                </div>
            </div>';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testFailureAddItemToHTML()
    {
        $input = [['variety' => NULL, 'tones' => 'oaky afterbirth', 'cost' => '7.99',
            'nameOfBrand' => 'generic name', 'region' => 'australia', 'img_location' => 'folder/file.png']];
        $expectedOutput = '';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testFailure2AddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => NULL, 'cost' => '7.99',
            'nameOfBrand' => 'generic name', 'region' => 'australia', 'img_location' => 'folder/file.png']];
        $expectedOutput = '';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testFailure3AddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => 'oaky afterbirth', 'cost' => NULL,
            'nameOfBrand' => 'generic name', 'region' => 'australia', 'img_location' => 'folder/file.png']];
        $expectedOutput = '';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testFailure4AddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => 'oaky afterbirth', 'cost' => '7.99', 'nameOfBrand' => NULL,
            'region' => 'australia', 'img_location' => 'folder/file.png']];
        $expectedOutput = '';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testFailure5AddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => 'oaky afterbirth', 'cost' => '7.99',
            'nameOfBrand' => 'generic name', 'region' => NULL, 'img_location' => 'folder/file.png']];
        $expectedOutput = '';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testFailure6AddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => 'oaky afterbirth', 'cost' => '7.99',
            'nameOfBrand' => 'generic name', 'region' => 'australia', 'img_location' => NULL]];
        $expectedOutput = '<div class = "itemContainer">
                <h2>Variety: merlot</h2>
                <p>Brand: generic name</p>
                <p>Cost: £7.99</p>
                <p>Region of Origin: australia</p>
                <p>Tones: oaky afterbirth</p>
                <div class="itemImg">
                    <img src="imgs/plain-bottle.png" alt="image of wine">
                </div>
            </div>';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }
    public function testFailure7AddItemToHTML()
    {
        $input = [['variety' => 'merlot', 'tones' => 'oaky afterbirth', 'cost' => '7.99',
            'nameOfBrand' => 'generic name', 'region' => 'australia', 'img_location' => 'folder/file.png'],
            ['variety' => 'blah', 'tones' => 'oaky afterbirth2', 'cost' => '7.99',
            'nameOfBrand' => 'generic name', 'region' => NULL, 'img_location' => 'location.png']];
        $expectedOutput = '<div class = "itemContainer">
                <h2>Variety: merlot</h2>
                <p>Brand: generic name</p>
                <p>Cost: £7.99</p>
                <p>Region of Origin: australia</p>
                <p>Tones: oaky afterbirth</p>
                <div class="itemImg">
                    <img src="folder/file.png" alt="image of wine">
                </div>
            </div>';

        $result = addItemToHTML($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testMalformedAddItemToHTML()
    {
        $this->expectException(TypeError::class);
        $input = 'hello';
        addItemToHTML($input);
    }
}


