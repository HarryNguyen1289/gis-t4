<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Tìm đường qua các phòng trong tòa nhà B</title>

    <style>
        html,
        body,
        #viewDiv {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;   
            font-family: 'Helvetica';
            font-size:14px;  
            position: relative;      
        }
        .address-container{
            width: 25rem;
            min-height: 40rem;
            height: auto;
            background-color: white;
            position: absolute;
            left: 5%;
            top: 10%;
            border-radius: 5px;
        }
        .form{
            height: 9rem;
            background-color: #1A73E8;
            position: relative
        }
        .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #ced4da !important;
            opacity: 1; /* Firefox */
        }
        .search{
            position: absolute;
            bottom: -45%;
            left: 35%;
        }
        .content{
            height: auto;
            margin-top: 5rem; 
        }
        #phong1,#phong2{
            background-color: transparent;
            color: #ced4da;
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0px;
        }

        .StepProgress {
            position: relative;
            padding-left: 45px;
            list-style: none;
        }
        .StepProgress::before {
            display: inline-block;
            content: '';
            position: absolute;
            top: 0;
            left: 15px;
            width: 10px;
            height: 95%;
            border-left: 2px solid #CCC;
        }
        .StepProgress-item {
            position: relative;
            counter-increment: list;
        }
        .StepProgress-item:not(:last-child) {
            padding-bottom: 20px;
        }
        .StepProgress-item::after {
            content: '';
            display: inline-block;
            position: absolute;
            top: 0;
            left: -13%;
            width: 1rem;
            height: 1rem;
            border: 2px solid #CCC;
            border-radius: 50%;
            background-color: #FFF;
        }
        .StepProgress-item.head::before {
            border-left: 2px solid #1A73E8;
        }
        .StepProgress-item.head::after {
            content: "";
            border: 2px solid #1A73E8;
            background-color: #1A73E8;
        }
        .StepProgress strong {
            display: block;
        }
    </style>

    <link rel="stylesheet" href="https://js.arcgis.com/4.16/esri/themes/light/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://js.arcgis.com/4.16/"></script>

    <script>
        require([
            "esri/Map",
            "esri/views/SceneView",
            "esri/layers/GeoJSONLayer",
            "esri/layers/SceneLayer"
        ], function(Map, SceneView, GeoJSONLayer, SceneLayer) {
            // Khối A
            <?php 
            $flag1 = [
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
            ]
            ?>
            @foreach( $flag1 as $key => $item)
                @foreach($item as $key1 => $item1)
                    const geojson{{$key+1}}af{{$key1+1}}1  = new GeoJSONLayer({
                        url: "geojson/body/a/{{$key + 1}}af{{$key1 +1}}1.geojson"
                    })
                    geojson{{$key+1}}af{{$key1+1}}1.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 1, //chiều cao
                                material: {
                                    color: "#019ee2" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}af{{$key1+1}}2  = new GeoJSONLayer({
                        url: "geojson/body/a/{{$key + 1}}af{{$key1 +1}}2.geojson"
                    })
                    geojson{{$key+1}}af{{$key1+1}}2.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#87dbfa" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}af{{$key1+1}}3  = new GeoJSONLayer({
                        url: "geojson/body/a/{{$key + 1}}af{{$key1 +1}}3.geojson"
                    })
                    geojson{{$key+1}}af{{$key1+1}}3.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#ffffff" // xanh dam
                                }
                            }]
                        }
                    };
                @endforeach
            @endforeach

            // Khối B
            <?php 
            $flag2 = [
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
            ]
            ?>

            @foreach( $flag2 as $key => $item)
                @foreach($item as $key1 => $item1)
                    const geojson{{$key+1}}bf{{$key1+1}}1  = new GeoJSONLayer({
                        url: "geojson/body/b/{{$key + 1}}bf{{$key1 +1}}1.geojson"
                    })
                    geojson{{$key+1}}bf{{$key1+1}}1.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 1, //chiều cao
                                material: {
                                    color: "#019ee2" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}bf{{$key1+1}}2  = new GeoJSONLayer({
                        url: "geojson/body/b/{{$key + 1}}bf{{$key1 +1}}2.geojson"
                    })
                    geojson{{$key+1}}bf{{$key1+1}}2.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#87dbfa" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}bf{{$key1+1}}3  = new GeoJSONLayer({
                        url: "geojson/body/b/{{$key + 1}}bf{{$key1 +1}}3.geojson"
                    })
                    geojson{{$key+1}}bf{{$key1+1}}3.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#ffffff" // xanh dam
                                }
                            }]
                        }
                    };
                @endforeach
            @endforeach

            // Khối C
            <?php 
            $flag3 = [
                [
                    [1,2,3]
                ],
                [
                    [1,2,3]
                ],
                [
                    [1,2,3]
                ],
                [
                    [1,2,3]
                ],
                [
                    [1,2,3]
                ],
                [
                    [1,2,3]
                ],
                [
                    [1,2,3]
                ],
            ]
            ?>

            @foreach( $flag3 as $key => $item)
                @foreach($item as $key1 => $item1)
                    const geojson{{$key+1}}cf{{$key1+1}}1  = new GeoJSONLayer({
                        url: "geojson/body/c/{{$key + 1}}cf{{$key1 +1}}1.geojson"
                    })
                    geojson{{$key+1}}cf{{$key1+1}}1.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 1, //chiều cao
                                material: {
                                    color: "#019ee2" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}cf{{$key1+1}}2  = new GeoJSONLayer({
                        url: "geojson/body/c/{{$key + 1}}cf{{$key1 +1}}2.geojson"
                    })
                    geojson{{$key+1}}cf{{$key1+1}}2.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#87dbfa" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}cf{{$key1+1}}3  = new GeoJSONLayer({
                        url: "geojson/body/c/{{$key + 1}}cf{{$key1 +1}}3.geojson"
                    })
                    geojson{{$key+1}}cf{{$key1+1}}3.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#ffffff" // xanh dam
                                }
                            }]
                        }
                    };
                @endforeach
            @endforeach

            // Khối D
            <?php 
            $flag4 = [
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ]
            ]
            ?>

            @foreach( $flag4 as $key => $item)
                @foreach($item as $key1 => $item1)
                    const geojson{{$key+1}}df{{$key1+1}}1  = new GeoJSONLayer({
                        url: "geojson/body/d/{{$key + 1}}df{{$key1 +1}}1.geojson"
                    })
                    geojson{{$key+1}}df{{$key1+1}}1.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 1, //chiều cao
                                material: {
                                    color: "#019ee2" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}df{{$key1+1}}2  = new GeoJSONLayer({
                        url: "geojson/body/d/{{$key + 1}}df{{$key1 +1}}2.geojson"
                    })
                    geojson{{$key+1}}df{{$key1+1}}2.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#87dbfa" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}df{{$key1+1}}3  = new GeoJSONLayer({
                        url: "geojson/body/d/{{$key + 1}}df{{$key1 +1}}3.geojson"
                    })
                    geojson{{$key+1}}df{{$key1+1}}3.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#ffffff" // xanh dam
                                }
                            }]
                        }
                    };
                @endforeach
            @endforeach

            // Khối E
            <?php 
            $flag5 = [
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ]
            ]
            ?>

            @foreach( $flag5 as $key => $item)
                @foreach($item as $key1 => $item1)
                    const geojson{{$key+1}}ef{{$key1+1}}1  = new GeoJSONLayer({
                        url: "geojson/body/e/{{$key + 1}}ef{{$key1 +1}}1.geojson"
                    })
                    geojson{{$key+1}}ef{{$key1+1}}1.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 1, //chiều cao
                                material: {
                                    color: "#019ee2" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}ef{{$key1+1}}2  = new GeoJSONLayer({
                        url: "geojson/body/e/{{$key + 1}}ef{{$key1 +1}}2.geojson"
                    })
                    geojson{{$key+1}}ef{{$key1+1}}2.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#87dbfa" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}ef{{$key1+1}}3  = new GeoJSONLayer({
                        url: "geojson/body/e/{{$key + 1}}ef{{$key1 +1}}3.geojson"
                    })
                    geojson{{$key+1}}ef{{$key1+1}}3.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#ffffff" // xanh dam
                                }
                            }]
                        }
                    };
                @endforeach
            @endforeach

            // Khối F
            <?php 
            $flag6 = [
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ],
                [
                    [1,2,3],
                    [1,2,3]
                ]
            ]
            ?>

            @foreach( $flag6 as $key => $item)
                @foreach($item as $key1 => $item1)
                    const geojson{{$key+1}}ff{{$key1+1}}1  = new GeoJSONLayer({
                        url: "geojson/body/f/{{$key + 1}}ff{{$key1 +1}}1.geojson"
                    })
                    geojson{{$key+1}}ff{{$key1+1}}1.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 1, //chiều cao
                                material: {
                                    color: "#019ee2" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}ff{{$key1+1}}2  = new GeoJSONLayer({
                        url: "geojson/body/f/{{$key + 1}}ff{{$key1 +1}}2.geojson"
                    })
                    geojson{{$key+1}}ff{{$key1+1}}2.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#87dbfa" // xanh dam
                                }
                            }]
                        }
                    };

                    const geojson{{$key+1}}ff{{$key1+1}}3  = new GeoJSONLayer({
                        url: "geojson/body/f/{{$key + 1}}ff{{$key1 +1}}3.geojson"
                    })
                    geojson{{$key+1}}ff{{$key1+1}}3.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: 2, //chiều cao
                                material: {
                                    color: "#ffffff" // xanh dam
                                }
                            }]
                        }
                    };
                @endforeach
            @endforeach

	        //TwoSide
            const geojsonWallLeft  = new GeoJSONLayer({
                url: "geojson/TwoSide/WallLeft.geojson"
            })
            geojsonWallLeft.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 40, //chiều cao
                        material: {
                            color: "#87dbfa" // xanh nhat
                        }
                    }]
                }
            };

            const geojsonWallRight  = new GeoJSONLayer({
                url: "geojson/TwoSide/WallRight.geojson"
            })
            geojsonWallRight.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 20, //chiều cao
                        material: {
                            color: "#87dbfa" // xanh nhat
                        }
                    }]
                }
            };

	        const geojsonWallWindowSize1  = new GeoJSONLayer({
                url: "geojson/TwoSide/WallWindowSize1.geojson"
            })
            geojsonWallWindowSize1.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 1, //chiều cao
                        material: {
                            color: "#87dbfa" // xanh nhat
                        }
                    }]
                }
            };
	
	    const geojsonWallWindowSize2  = new GeoJSONLayer({
                url: "geojson/TwoSide/WallWindowSize2.geojson"
            })
            geojsonWallWindowSize2.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 2, //chiều cao
                        material: {
                            color: "#87dbfa" // xanh nhat
                        }
                    }]
                }
            };
		
	    const geojsonWindowRight  = new GeoJSONLayer({
                url: "geojson/TwoSide/WindowRight.geojson"
            })
            geojsonWindowRight.renderer = {
                type: "simple",
                symbol: {
                    type: "line-3d",
                    symbolLayers: [{
                        type: "path",
                        width: 0.1,
                        material: {
                            color: "#FFFFFF" // White
                        }
                    }]
                }
            };

            const geojsonWindowLeft  = new GeoJSONLayer({
                url: "geojson/TwoSide/WindowLeft.geojson"
            })
            geojsonWindowLeft.renderer = {
                type: "simple",
                symbol: {
                    type: "line-3d",
                    symbolLayers: [{
                        type: "path",
                        width: 0.1,
                        material: {
                            color: "#FFFFFF" // White
                        }
                    }]
                }
            };

            // Front
            <?php $arrf = [6,34.2,30.2,26.2,22.2,18.2,14.2 ] ?>
            @for($i = 0; $i < 7; $i++)
                const geojsonf{{$i}}  = new GeoJSONLayer({
                    url: "geojson/front/f{{$i}}.geojson"
                })

                geojsonf{{$i}}.renderer = {
                    type: "simple",
                    symbol: {
                        type: "polygon-3d",
                        symbolLayers: [{
                            type: "extrude",
                            size: {{ $arrf[$i] }}, //chiều cao
                            material: {
                                @if( $i == 0 )
                                    color: "#7DA859"
                                @else
                                    color: "#87dbfa"
                                @endif
                            }
                        }]
                    }
                };
            @endfor
            //wall
            <?php $arrf = [0,40,36,32,28,24,20] ?>
                @for($i = 1; $i < 7; $i++)
                    const geojsonw{{$i}}  = new GeoJSONLayer({
                        url: "geojson/Wall/insideWall/f{{$i}}.geojson"
                    })

                    geojsonw{{$i}}.renderer = {
                        type: "simple",
                        symbol: {
                            type: "polygon-3d",
                            symbolLayers: [{
                                type: "extrude",
                                size: {{ $arrf[$i] }}, //chiều cao
                                material: {
                                        color: "#73f1ff"
                                }
                            }]
                        }
                    };
                @endfor
            //balcony
            const geojsonbalcony  = new GeoJSONLayer({
                        url: "geojson/balcony/balconyInside.geojson"
                    })

                    geojsonbalcony.renderer = {
                        type: "simple",
                        symbol: {
                            type: "line-3d",
                            symbolLayers: [{
                                type: "path",
                                width : 0.1,
                                material: {
                                        color: "#2e3536"
                                }
                            }]
                        }
                    };
            //windowOutside
            const geojsonwindowOutside  = new GeoJSONLayer({
                        url: "geojson/window/windowA.geojson"
                    })

                    geojsonwindowOutside.renderer = {
                        type: "simple",
                        symbol: {
                            type: "line-3d",
                            symbolLayers: [{
                                type: "path",
                                width : 0.1,
                                material: {
                                        color: "#000000"
                                }
                            }]
                        }
                    };
            //windowInsideFrame
            const geojsonwindowInsideFrame = new GeoJSONLayer({
                        url: "geojson/window/windowInside/frame1.geojson"
                    })

                    geojsonwindowInsideFrame.renderer = {
                        type: "simple",
                        symbol: {
                            type: "line-3d",
                            symbolLayers: [{
                                type: "path",
                                width : 0.1,
                                material: {
                                        color: "#000000"
                                }
                            }]
                        }
                    };
            
            //balconyroof
            const geojsonbalconyroof  = new GeoJSONLayer({
                        url: "geojson/balcony/balconyroof.geojson"
                    })

                    geojsonbalconyroof.renderer = {
                        type: "simple",
                        symbol: {
                            type: "line-3d",
                            symbolLayers: [{
                                type: "path",
                                width : 0.1,
                                material: {
                                        color: "#019ee2"
                                }
                            }]
                        }
                    };

            //pillarroof
            const geojsonpillarroof  = new GeoJSONLayer({
                        url: "geojson/balcony/pillarroof.geojson"
                    })

                    geojsonpillarroof.renderer = {
                        type: "simple",
                        symbol: {
                            type: "line-3d",
                            symbolLayers: [{
                                type: "path",
                                width : 0.1,
                                material: {
                                        color: "#019ee2"
                                }
                            }]
                        }
                    };

            // floor
            @for($i = 0; $i < 8; $i++)
                const geojsonfl{{$i}}  = new GeoJSONLayer({
                    url: "geojson/floor/f{{$i}}.geojson"
                })

                geojsonfl{{$i}}.renderer = {
                    type: "simple",
                    symbol: {
                        type: "polygon-3d",
                        symbolLayers: [{
                            type: "extrude",
                            size: 0.2, //chiều cao
                            material: {
                                @if($i <7)
                                    color: "#ffffff"
                                @else
                                    color: "#87dbfa"
                                @endif
                            }
                        }]
                    }
                };
            @endfor

            <?php $arrs = [0,2.4,0.8,1.6,3.2 ] ?>
            @for($i = 1; $i < 5; $i++)
                const geojsons{{$i}}  = new GeoJSONLayer({
                    url: "geojson/stair/s{{$i}}.geojson"
                })

                geojsons{{$i}}.renderer = {
                    type: "simple",
                    symbol: {
                        type: "polygon-3d",
                        symbolLayers: [{
                            type: "extrude",
                            size: {{ $arrs[$i] }}, //chiều cao
                            material: {
                                color: "#E0DBCB"
                            }
                        }]
                    }
                };
            @endfor

            @for($i = 1; $i < 4; $i++)
                const geojsonsi{{$i}}  = new GeoJSONLayer({
                    url: "geojson/stair/si{{$i}}.geojson"
                })

                geojsonsi{{$i}}.renderer = {
                    type: "simple",
                    symbol: {
                        type: "polygon-3d",
                        symbolLayers: [{
                            type: "extrude",
                            size: 4, //chiều cao
                            material: {
                                color: "#61706B"
                            }
                        }]
                    }
                };
            @endfor

            const dat  = new GeoJSONLayer({
                url: "geojson/dat.geojson"
            })
            dat.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 4.2, //chiều cao
                        material: {
                            color: "#87dbfa"
                        }
                    }]
                }
            };

            const geojsontrusau_duoi  = new GeoJSONLayer({url: "geojson/trusau_duoi.geojson"});
            geojsontrusau_duoi.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 3, //chiều cao
                        material: {
                            color: "#019ee2" // xanh dam
                        }
                    }]
                }
            };
            const geojsontrusau_tren  = new GeoJSONLayer({url: "geojson/trusau_tren.geojson"});
            geojsontrusau_tren.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 1, //chiều cao
                        material: {
                            color: "#019ee2" // xanh dam
                        }
                    }]
                }
            };


            const minh  = new GeoJSONLayer({url: "geojson/circle.geojson"});
            minh.renderer = {
                type: "simple",
                symbol: {
                    type: "polygon-3d",
                    symbolLayers: [{
                        type: "extrude",
                        size: 1, //chiều cao
                        material: {
                            color: "#ebf2bf"
                        }
                    }]
                }
            };
            //windowInside
            <?php $arrs = [0, 35, 27, 23, 15 ] ?>
            @for($i = 1; $i < 5; $i++)
                const geojsonLayerwindow{{$i}} = new GeoJSONLayer({url: "geojson/window/windowInside/windowInside{{$i}}.geojson"});
                geojsonLayerwindow{{$i}}.renderer = {
                    type: "simple",
                    symbol: {
                        type: "polygon-3d",
                        symbolLayers: [
                            {
                                type: "extrude",
                                size: {{ $arrs[$i] }},
                                material: {
                                    color: "#019ee2"
                                }
                            }
                        ]
                    }
                };
            @endfor

            const map = new Map({
                basemap: "topo-vector",
                ground: "world-elevation",
                // layers: [geojsonLayer, geojsonLayer2, geojsonLayer3, geojsonLayer4 ] //Những layer xuất hiện
                layers: [
                @foreach( $flag1 as $key => $item)
                    @foreach($item as $key1 => $item1)
                         geojson{{$key+1}}af{{$key1+1}}1,
                         geojson{{$key+1}}af{{$key1+1}}2,
                         geojson{{$key+1}}af{{$key1+1}}3,
                    @endforeach
                @endforeach
                @foreach( $flag2 as $key => $item)
                    @foreach($item as $key1 => $item1)
                        geojson{{$key+1}}bf{{$key1+1}}1,
                        geojson{{$key+1}}bf{{$key1+1}}2,
                        geojson{{$key+1}}bf{{$key1+1}}3,
                    @endforeach
                @endforeach
                @foreach( $flag3 as $key => $item)
                    @foreach($item as $key1 => $item1)
                        geojson{{$key+1}}cf{{$key1+1}}1,
                        geojson{{$key+1}}cf{{$key1+1}}2,
                        geojson{{$key+1}}cf{{$key1+1}}3,
                    @endforeach
                @endforeach
                @foreach( $flag4 as $key => $item)
                    @foreach($item as $key1 => $item1)
                        geojson{{$key+1}}df{{$key1+1}}1,
                        geojson{{$key+1}}df{{$key1+1}}2,
                        geojson{{$key+1}}df{{$key1+1}}3,
                    @endforeach
                @endforeach
                @foreach( $flag5 as $key => $item)
                    @foreach($item as $key1 => $item1)
                        geojson{{$key+1}}ef{{$key1+1}}1,
                        geojson{{$key+1}}ef{{$key1+1}}2,
                        geojson{{$key+1}}ef{{$key1+1}}3,
                    @endforeach
                @endforeach
                @foreach( $flag6 as $key => $item)
                    @foreach($item as $key1 => $item1)
                        geojson{{$key+1}}ff{{$key1+1}}1,
                        geojson{{$key+1}}ff{{$key1+1}}2,
                        geojson{{$key+1}}ff{{$key1+1}}3,
                    @endforeach
                @endforeach
                @for($i = 0; $i < 7; $i++)
                     geojsonf{{$i}},
                @endfor
                @for($i = 1; $i < 7; $i++)
                     geojsonw{{$i}},
                @endfor
                @for($i = 0; $i < 8; $i++)
                    geojsonfl{{$i}},
                @endfor
                @for($i = 1; $i < 5; $i++)
                    geojsons{{$i}},
                @endfor
                @for($i = 1; $i < 4; $i++)
                    geojsonsi{{$i}},
                @endfor
                dat,
                geojsontrusau_duoi,
                geojsontrusau_tren,
                minh,
                @for($i = 1; $i < 5; $i++)
                    geojsonLayerwindow{{$i}},
                @endfor
                geojsonbalcony,
                geojsonbalconyroof,
                geojsonpillarroof,
                geojsonwindowOutside,
                geojsonwindowInsideFrame,            
               
		    geojsonWallLeft, geojsonWallRight, geojsonWallWindowSize1, geojsonWallWindowSize2, geojsonWindowRight, geojsonWindowLeft
                ] //Những layer xuất hiện
            });

            const view = new SceneView({
                container: "viewDiv",
                map: map,
                camera: {
                    position: [106.803657, 10.868464, 80],
                    heading: 0,
                    tilt: 75
                }
            });
            view.popup.defaultPopupTemplateEnabled = true;
        });
    </script>
</head>

<body>
<div id="viewDiv">
    <div class="address-container">
        <div class="form">
            <form  class="p-3" action="#" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <select id="room-from" class="form-control" name="start_node_id">
                        <option value="0" selected>Chọn phòng bắt đầu</option>
                        @foreach($rooms as $item)
                            <option value="{{$item->node_id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <select id="room-to" class="form-control" name="end_node_id">
                        <option value="0" selected>Chọn phòng đích đến</option>
                        @foreach($rooms as $item)
                            <option value="{{$item->node_id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>       
                <button id="search-btn" type="button" class="btn btn-primary btn-md search"> Tìm Đường </button>
            </form>
        </div>
        <div class="content p-3">
            <div style="height: 300px; overflow-y: auto;">
                <ul class="StepProgress" id="text-list">
                </ul>
            </div>
            <div id="link-view-3d" style="text-align: center; margin: 15px 0; display: none;">
                <a href="/path" target="_blank">View In 3D</a>
            </div>
            <p style="margin-top: 20px;" class="h4 text-center">HỆ HỖ TRỢ DẪN ĐƯỜNG ĐI TRONG TÒA NHÀ B - UIT</p>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#search-btn").on('click', function(event) {
            event.preventDefault();
            $("#text-list").empty();
            var roomFrom = $("#room-from").val();
            var roomTo = $("#room-to").val();
            console.log("Search", roomFrom, roomTo);
            $.ajax({
                type: "POST",
                url: "/node/get_shortest_path",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'start_node_id': roomFrom,
                    'end_node_id': roomTo,
                },
                success: function(res) {
                    var textList = res.text_list;
                    var lineData = res.lineData;
                    lineData = lineData.map(function(node) {
                        return {
                            pos: {
                                x: parseFloat(node.pos.x),
                                y: parseFloat(node.pos.y),
                                z: node.pos.z
                            },
                            type: node.type,
                            nodeId: node.nodeId,
                            name: node.name
                        }
                    });

                    localStorage.setItem('lineData', JSON.stringify(lineData));

                    textList.forEach(function(text, index) {
                        if (index == 0) {
                            $("#text-list").append(`<li class="StepProgress-item head"><strong>${text}</strong></li>`);    
                        } else {
                            $("#text-list").append(`<li class="StepProgress-item"><strong>${text}</strong></li>`);
                        }
                    });
                    $("#link-view-3d").show();
                }
            });
        })
    });
</script>
</body>

</html>
