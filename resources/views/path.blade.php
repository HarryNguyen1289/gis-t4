<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport"
	content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Tìm đường qua các phòng trong tòa nhà B</title>

<style>
html, body, #viewDiv {
	padding: 0;
	margin: 0;
	height: 100%;
	width: 100%;
}

#back {
	position: absolute;
	bottom: 20px;
}

#back i {
	background-image: url(app/public/img/back.svg);
	background-repeat: no-repeat;
	display: inline-block;
	width: 100px;
	height: 25px;
	padding-left: 25px;
	padding-top: 2px;
	margin: 10px;
	cursor: pointer;
	background-size: 20px;
}
</style>

<link rel="stylesheet"
	href="https://js.arcgis.com/4.16/esri/themes/light/main.css" />
<script src="https://js.arcgis.com/4.16/"></script>

<script>
	var lineData = 
	[
		{
			"_comment": "Cầu thang 1",
			"type": "polyline",
			"popupTemplate": {
				"title": "Đường đi ngắn nhất"
			},
			"paths": [],
			"symbol": {
				"color": [235, 52, 52]
			}
		}
	];

	var store = JSON.parse(localStorage.getItem("lineData"));
	store.forEach(function(node) {
		lineData[0].paths.push([
			node.pos.x,
			node.pos.y,
			node.pos.z
		]);
	});
	
	store.forEach(function(node) {
		if (node.type == "room") {
			lineData.push({
				"type": "point",
				"popupTemplate": {
					"title": "Phòng " + node.name,
					"content": `Đây là <b>Phòng ${node.name}</b>.`
				},
				
				"x": node.pos.x, 
				"y":  node.pos.y ,
				"z": node.pos.z,
				"symbol": {
					"type": "Point",
					"outline": {
						"color": [
							255,
							255,
							255
						],
						"width":2
					}
				}
			})
		}

		if (node.type == "stair") {
			lineData.push({
				"type": "point",
				"popupTemplate": {
					"title": node.name,
					"content": `Đây là ${node.name}</b>.`
				},
				
				"x": node.pos.x, 
				"y":  node.pos.y ,
				"z": node.pos.z,
				"symbol": {
					"type": "Point",
					"outline": {
						"color": [
							255,
							255,
							255
						],
						"width":2
					}
				}
			})
		}
	});

	require([
		"esri/Map",
		"esri/views/SceneView",
		"esri/layers/GeoJSONLayer",
		"esri/layers/SceneLayer", "esri/layers/GraphicsLayer", "esri/Graphic", "esri/request"
	], function (Map, SceneView, GeoJSONLayer, SceneLayer,
					GraphicsLayer, Graphic, esriRequest) {
		var createGraphic = function(data) {
			return new Graphic({
				geometry : data,
				symbol : data.symbol,
				attributes : data,
				popupTemplate : data.popupTemplate
			});
		};
		
		const json_options = {
			query : {
				f : "json"
			},
			responseType : "json"
		};
		
		const map = new Map({
			basemap: "topo-vector",
			ground: "world-elevation",
		});

		esriRequest('./data.json', json_options).then(function(response) {
			var graphicsLayer = new GraphicsLayer();
			response.data.forEach(function(data){
				graphicsLayer.add(createGraphic(data));
			});
			map.add(graphicsLayer);

		});	

		var graphicsLayer2 = new GraphicsLayer();
		lineData.forEach(function(data){
			graphicsLayer2.add(createGraphic(data));
		});
		map.add(graphicsLayer2);

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
	<div id="viewDiv"></div>
</body>
</html>