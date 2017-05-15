<?php

namespace App\Helpers;


class DsmParser
{
    public $configurations;
    public $dataset;
    public $signalFlow;

    private $array;
    private $eq1;
    private $eq2;
    private $signalFlows;

    public function __construct($contents)
    {

        $this->array = json_decode(json_encode(simplexml_load_string($contents)), true);
        $this->eq1 = $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'];
        $this->eq2 = $this->array['datasets']['dataset']['parameters']['parameter'][20]['input']['group']['parameters']['parameter'];
        $this->signalFlows = $this->array['datasets']['dataset']['parameters']['parameter'][0]['input']['uint8']['dataentries']['entry'];
        $this->signalFlow = ['value' => $this->array['datasets']['dataset']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value']];
        $this->configurations = [];

        foreach ((array) $this->signalFlows as $key => $signalFlow){
            array_push($this->configurations, ['value' => $signalFlow['@attributes']['value'], 'name' => $signalFlow['@attributes']['name']]);

            if($signalFlow['@attributes']['value'] == $this->signalFlow['value']){
                $this->signalFlow['name'] = $signalFlow['@attributes']['name'];
            }
        }

        $this->dataset = $this->dataset();
    }

    public function eq1()
    {
        return $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'];
    }

    public function eq2()
    {
        return $this->array['datasets']['dataset']['parameters']['parameter'][20]['input']['group']['parameters']['parameter'];
    }

    public function channel($number)
    {
        return [
            'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][1]['input']['int8']['data']['@attributes']['value'],
            'delay' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][2]['input']['uint8']['data']['@attributes']['value'],
            'filters' => [
                0 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][0]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][0]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][0]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][0]['input']['group']['parameters']['parameter'][7]['input']['int8']['data']['@attributes']['value']
                ],
                1 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][3]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][3]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][3]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][3]['input']['group']['parameters']['parameter'][7]['input']['int8']['data']['@attributes']['value']
                ],
                2 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][4]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][4]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][4]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][4]['input']['group']['parameters']['parameter'][7]['input']['int8']['data']['@attributes']['value']
                ],
                3 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][5]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][5]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][5]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][5]['input']['group']['parameters']['parameter'][3]['input']['int8']['data']['@attributes']['value']
                ],
                4 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][6]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][6]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][6]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][6]['input']['group']['parameters']['parameter'][3]['input']['int8']['data']['@attributes']['value']
                ],
                5 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][7]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][7]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][7]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][7]['input']['group']['parameters']['parameter'][3]['input']['int8']['data']['@attributes']['value']
                ],
                6 => [
                    'type' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][8]['input']['group']['parameters']['parameter'][0]['input']['uint8']['data']['@attributes']['value'],
                    'frequency' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][8]['input']['group']['parameters']['parameter'][2]['input']['uint16']['data']['@attributes']['value'],
                    'quality' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][8]['input']['group']['parameters']['parameter'][1]['input']['uint8']['data']['@attributes']['value'],
                    'gain' => $this->array['datasets']['dataset']['parameters']['parameter'][11]['input']['group']['parameters']['parameter'][$number]['input']['group']['parameters']['parameter'][8]['input']['group']['parameters']['parameter'][3]['input']['int8']['data']['@attributes']['value']
                ],
            ]
        ];
    }

    public function dataset()
    {
        $dataset = [
            'signalFlow' => $this->signalFlow,
            'EQ1' => [
                'channels' => [
                    0 => $this->channel(0),
                    1 => $this->channel(1),
                    2 => $this->channel(2),
                    3 => $this->channel(3),
                    4 => $this->channel(4),
                    5 => $this->channel(5)
                ]
            ],
            'EQ2' => []
        ];

        return $dataset;
    }
}