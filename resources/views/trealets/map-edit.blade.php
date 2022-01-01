@extends('layouts.app')

@section('page-title', 'Map Edit')
@section('page-heading', 'Map Edit')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
  You can edit your map trealet here
    </li>
@stop

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="map-tab" data-toggle="tab" href="#map-content" role="tab" aria-controls="map-content" aria-selected="true">Thông tin bản đồ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="locations-tab" data-toggle="tab" href="#locations-content" role="tab" aria-controls="locations-content" aria-selected="false">Thông tin địa điểm</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="map-content" role="tabpanel" aria-labelledby="map-tab">
            <div>
              <form id="mapDetailForm" class="was-validated">

                <div class=" mb-3">
                  <label for="mapTitle">Tên bản đồ Trealet</label>
                  <input type="text" class="form-control" id="mapTitle" placeholder="ex: Ban do Hoang thanh Thang Long" required>
                  <div class="invalid-feedback">
                    Hãy điền tên bản đồ
                  </div>
                </div>
                <div class=" mb-3">
                  <label for="mapDesc">Mô tả về bản đồ Trealet</label>
                  <input type="text" class="form-control" id="mapDesc" placeholder="Hoang thanh Thang Long la ...." required>
                  <div class="invalid-feedback">
                    Hãy điền thông tin bản đồ
                  </div>
                </div>
                
              </form>
            </div>
        </div>
        <div class="tab-pane fade" id="locations-content" role="tabpanel" aria-labelledby="locations-tab">
            <div class="container-fluid ch-100">
                <div class="row">
                    <div class="col-3">
                        @csrf
                        <form id="addForm" onsubmit="return false">
                            <input type="number" name="placeId" id="placeId" style="display: none;">
                            <div class="mb-3" style="display: none">
                              <label for="lat"  class="form-label">Latitude</label>
                              <input type="number" step="any" class="form-control" id="placeLat" placeholder="ex 21.036713" required>
                            </div>
                            <div class="mb-3" style="display: none">
                              <label for="lng" class="form-label">Longitude</label>
                              <input type="number" step ="any" class="form-control" id="placeLng" placeholder="ex 105.844210" required>
                            </div>
                            <div class="mb-3">
                              <label for="placeName" class="form-label">Tên địa điểm</label>
                              <input type="text" class="form-control" id="placeName" placeholder="ex: Cầu Long Biên" required>
                              <div class="invalid-feedback">
                                Hãy điền tên bản đồ
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="placeDes" class="form-label">Mô tả địa điểm</label>
                              <textarea class="form-control" id="placeDes" rows="8" placeholder="ex: Cầu Long Biên là ...."></textarea>
                            </div>
                            <div class="mb-3">
                              <select id="placeInputType" style="border: none">
                                 <option value="0">Hành động</option>       
                                 <option value="picture">Chụp ảnh</option>
                                 <option value="audio">Ghi âm</option>
                                 <option value="qr">Quét mã QR</option>
                                 <option value="form">Gửi lời nhận xét</option>
                              </select>

                              <div class="inputType_hide inputType_picture">
                                  <input type="textarea" class="form-control" rows = "4" class="inputType" name="inputType_picture" id="input_picture">
                              </div>
                              <div class="inputType_hide inputType_audio">
                                  <input type="textarea" class="form-control" rows="4" class="inputType" name="inputType_audio " id="input_audio">
                              </div>
                              <div class="inputType_hide inputType_qr">
                                  <input type="textarea" class="form-control" rows="4" class="inputType" name="inputType_qr" id="input_qr">
                              </div>
                              <div class="inputType_hide inputType_form">
                                <input type="textarea" class="form-control" rows="4" class="inputType" name="inputType_form" id="input_form">
                              </div>
                              
                            </div>

                            <input type="submit"  class="btn btn-primary btn-small" value="Lưu">
                            <input type="reset" class="btn btn-primary btn-small" value="Điền lại">
                            <input type="button" class="btn btn-danger btn-small" id="deleteMarker" value="Xóa" style="display: none">
                            
                        </form>
                    </div>
                    <div class="col-9" style="height: 100ch">
                        <div id="map" c style="width: 100%; height: 90%;"></div>
                        <br>
                        <input type="button" id="saveMap" class="btn btn-primary" name="saveMap" value="Lưu bản đồ khám phá" >
                    </div>
                    
                </div>

              </div>
        </div>
    </div>
    
@stop

@section('scripts')
    <script type="text/javascript">
      // local map data
      var temp_makers_scale = 4;
      var map;
      var mapPolyLine;
      var mapDesc = $('#mapDesc') ;
      var mapTitle = $('#mapTitle');
      var gMarkers = [];
      var locationLatLng = [];
      var temp_makers = {};
      var temp_latLng = {};
      var center_marker ={ "lat": 16.384327863830695, "lng": 107.07183203125003 } ;
      var zoom = 6;
      // icon = <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
      //         <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
      //       </svg>
      

      // map data in database
      var mapData = {!! json_encode($map_trealet->toArray(),JSON_HEX_TAG) !!};
      var locationData;
      var locations;
      var mapId;
      if(mapData.length != 0 ){
        mapId = '{!! $mapId !!}';
        locationData = JSON.parse(mapData.json);
        locations = JSON.parse(mapData.json).item;
        if(locations.length!=0){
          center_marker = locations[0];
          zoom = 10;
        }
      } else {
        locationData = {
          'exec':'map',
          'title':'',
          'author':'',
          'desc':'',
          'item': locations
        };
        locations =[];
        mapId = null;
      };

      // user_id(delete soon)
      var user_id = '{{ $user->id }}';

      

      
      var trealet = {
          'exec':'map',
          'title':mapData.title,
          'author':'',
          'desc':locationData.desc,
          'item': locations
      };
      var mapTrealet ={
        'user_id': user_id,
        'title':mapData.title,
        'type':"maps",
        'published': 0,
        'state':'1',
        'trealet': trealet};

      $(document).ready(function(){
          $('#mapDesc').val(trealet.desc);
          $('#mapTitle').val(trealet.title);
      })
      $(document).on("keydown", "input", function(e) {
          if (e.which==13) e.preventDefault();
      });

      $('#mapTitle').change(function(e){
          trealet.desc = mapDesc.val();
          mapTrealet.title = mapTitle.val();

      })
      $('#mapDesc').change(function(e){
          trealet.desc = mapDesc.val();
      })

      function initMap() {
            var icon = {
              path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
              fillColor: "blue",
              fillOpacity: 1,
              strokeWeight: 0,
              rotation: 0,
              scale: 2,
              anchor: new google.maps.Point(13, 21),
            };

          var infowindow = new google.maps.InfoWindow();

          map = new google.maps.Map(document.getElementById('map'), {
              zoom: zoom,
              center: new google.maps.LatLng(center_marker.lat,center_marker.lng),
              mapTypeId: google.maps.MapTypeId.ROADMAP,
          });

          temp_makers =new google.maps.Marker();
          //marker event
          if(locations != undefined){
            for (let i = 0; i < locations.length; i++) { 
              let marker;
              if (i!=0) {
                marker = new google.maps.Marker({
                  position: {lat: +locations[i].lat, lng: +locations[i].lng},
                  draggable: true,
                  map: map,
                });
              }
              else{
                marker = new google.maps.Marker({
                  position: {lat: +locations[i].lat, lng: +locations[i].lng},
                  draggable: true,
                  map: map,
                  icon: icon,
                });
              }

              

              gMarkers.push(marker);
              locationLatLng.push({lat: marker.position.lat(),lng: marker.position.lng()});
              
              const infowindow = new google.maps.InfoWindow();
              google.maps.event.addListener(marker, 'click', (function(marker) {
                return function() {
                  let j = gMarkers.indexOf(marker);
                  infowindow.close();
                  infowindow.setContent(locations[j].name);
                  infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                  })
                  click_marker(marker,j);
                }
              })(marker));
              google.maps.event.addListener(marker, 'mouseover', (function(marker) {
                return function() {
                  let j = gMarkers.indexOf(marker);
                  infowindow.close();
                  infowindow.setContent(locations[j].name);
                  infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                  })
                }
              })(marker, i));
              google.maps.event.addListener(marker, 'mouseout', (function(marker) {
                return function() {
                  let j = gMarkers.indexOf(marker);
                  infowindow.close();
                }
              })(marker));

              google.maps.event.addListener(marker,'dragstart',(function(event){
                infowindow.open({
                  anchor: marker,
                  map,
                  shouldFocus: false,
                })
              }))

              google.maps.event.addListener(marker,'drag',function(event){
                let j = gMarkers.indexOf(marker);
                const path = mapPolyLine.getPath();
                path.setAt(j,event.latLng);
              })
              google.maps.event.addListener(marker,'dragend',(function(event) {
                const i = gMarkers.indexOf(marker);
                locations[i].lat = event.latLng.lat();
                locations[i].lng = event.latLng.lng();



                infowindow.close();
              }))
                
            }
          }

          mapPolyLine = new google.maps.Polyline({
            path: locationLatLng,
            geodesic: true,
            strokeColor: "#000000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
            editable: true,
            draggable: false

          });
          
          google.maps.event.addListener(mapPolyLine,"dragend",updateMapPolyLine);
          mapPolyLine.addListener("dragstart",function(){
            console.log("dragstart");
          })
          mapPolyLine.setMap(map);
          map.addListener("click",(mapMouserEvent)=>{
              temp_makers.setMap(null);
              temp_makers = new google.maps.Marker({
                position: mapMouserEvent.latLng,
                icon: {
                  path: google.maps.SymbolPath.CIRCLE,
                  scale: temp_makers_scale,
                },
                map: map,
              })

              // const path = mapPolyLine.getPath();
              // path.push(mapMouserEvent.latLng);
              // console.log(mapMouserEvent.latLng);
              temp_latLng = mapMouserEvent.latLng;
              $('#addForm').trigger('reset');
              $('#placeLat').val(mapMouserEvent.latLng.lat());
              $('#placeLng').val(mapMouserEvent.latLng.lng());
              $("#deleteMarker").hide();
          })


          // mapPolyLine event
          google.maps.event.addListener(mapPolyLine.getPath(),'insert_at',function(event){
            console.log(event+" insert_at");

            if(event  != gMarkers.length){
              const index = event;

              const path = mapPolyLine.getPath();
              const lat = path.getAt(index).lat();
              const lng = path.getAt(index).lng();
              temp_latLng = path.getAt(index);
              const marker = new google.maps.Marker({
                  position: {lat: lat, lng: lng},
                  draggable: true,
                  map: map,
                });

              let pId = $("#placeId").val();
              let pName = $("#placeName").val();
              let pDes = $("#placeDes").val();
              let pInput = $("#placeInputType").val();
              let pInputLabel = $("#input_"+pInput).val();
              let input = {
                "type": pInput,
                "label": pInputLabel
              }
              let locationElement ={
                "name": pName,
                "lat": lat,
                "lng": lng,
                "desc": pDes,
                "input": input
              }
              if(pId==''){
                locations.splice(index,0,locationElement);
                gMarkers.splice(index,0,marker);


                const infowindow = new google.maps.InfoWindow({
                    content: '',
                  });
                google.maps.event.addListener(marker, 'click', (function(marker) {
                  return function() {
                    let i = gMarkers.indexOf(marker);

                    infowindow.close();
                    infowindow.open({
                      anchor: marker,
                      map,
                      shouldFocus: false,
                    });
                    infowindow.setContent(locations[i].name);
                    click_marker(marker,i);
                  }
                })(marker));
                google.maps.event.addListener(marker, 'mouseover', (function(marker) {
                    return function() {
                      let i = gMarkers.indexOf(marker);
                      infowindow.close();
                      infowindow.setContent(locations[i].name);
                      infowindow.open({
                        anchor: marker,
                        map,
                        shouldFocus: false,
                      })
                    }
                  })(marker));
                  google.maps.event.addListener(marker, 'mouseout', (function(marker) {
                    return function() {
                      infowindow.close();
                    }
                  })(marker));

                google.maps.event.addListener(marker,'dragstart',(function(event){
                  let i = gMarkers.indexOf(marker);
                  infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                  })
                }))
                google.maps.event.addListener(marker,'drag',function(event){
                    let i = gMarkers.indexOf(marker);
                    const path = mapPolyLine.getPath();
                    path.setAt(i,event.latLng);
                  })
                google.maps.event.addListener(marker,'dragend',(function(event) {
                  const i = gMarkers.indexOf(marker);
                  locations[i].lat = this.getPosition().lat();
                  locations[i].lng = this.getPosition().lng();
                  infowindow.close();
                }))
              }
              $("#addForm").trigger('reset');
            }
          })
          google.maps.event.addListener(mapPolyLine.getPath(),'remove_at',function(event){

            console.log(event+" remove_at");
            if(mapPolyLine.getPath().length != gMarkers.length){
              gMarkers[event].setMap(null);
              gMarkers.splice(event,1);
              locations.splice(event,1);
            }
            
          })
          google.maps.event.addListener(mapPolyLine.getPath(),'set_at',function(event){

            console.log(event+ " set_at");
          })
      }

      $('#saveMap').click(function(e){
        let url = "/api/map", method = "POST";
        if(mapId!=null){
          url = "/api/map/"+mapId;
          method = "PUT"
        } 
        Swal.fire({
              title: 'Bạn có muôn lưu lại bản đồ khám phá?',
              text: "",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Quay lại',
              confirmButtonText: 'Đồng ý',
              footer: '<a href="javascript:alert(getDetailFromLocations(locations))">Xem chi tiết bản đồ</a>'
          })
          .then((result)=>{
            if(result.isConfirmed){
              $.ajax({
                  url: url,
                  type: method,
                  data: JSON.stringify(mapTrealet),
                  contentType: "application/json; charset=utf-8",
                  success: function () {
                      Swal.fire({
                        title: 'Thành công',
                        text: "Bạn có muốn chuyển về trang quản lý trealet?",
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Ở lại',
                        confirmButtonText: 'Chuyển'
                      })
                      .then((result)=>{
                        if(result.isConfirmed){
                          window.location.href = "/my-trealets"
                        }
                      });
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                      Swal.fire("Lưu bản đồ thất bại", "Hãy kiểm tra lại thông tin bản đồ", "error");
                  }
              });
            }
            else{

            }
          })
      })

      function click_marker(marker,i){
        var pre_input_type = $("#placeInputType").val();
        $('#addForm').trigger('reset');
        $("#placeId").val(i);
        console.log($("#placeId").val());
        $("#placeName").val(locations[i].name);
        $("#placeLat").val(locations[i].lat);
        $("#placeLng").val(locations[i].lng);
        $("#placeDes").val(locations[i].desc);

        if($("#placeId").val()>=0) $("#placeInputType").val(locations[i].input.type).change();
        if($("#placeId").val()>=0) $("#placeInputType").val(locations[i].input.type).change();
        var inputType = $("#placeInputType").val();
        $("#input_"+inputType).val(locations[i].input.label);

        $("#deleteMarker").show();
      }

      function updateMapPolyLine(){
        console.log("update");
      }

      function deleteMarker(id){
        let location_temp = locations[id];
        locations.splice(id,1);
        var marker_temp = gMarkers[id];
        gMarkers[id].setMap(null);
        gMarkers.splice(id,1);
        const path = mapPolyLine.getPath();
        path.removeAt(id);

      
        $("#addForm").trigger('reset');
      }
      $("#deleteMarker").click(function(e){
        let p_id = $("#placeId").val();
        deleteMarker(p_id);
      })



      //add collapse to all tags hiden and showed by select mystuff
      $('.inputType_hide').addClass('collapse');

      //on change hide all divs linked to select and show only linked to selected option
      $('#placeInputType').change(function(){
          console.log("change");
          //Saves in a variable the wanted div
          var selector = '.inputType_' + $(this).val();

          //hide all elements
          $('.inputType_hide').collapse('hide');

          //show only element connected to selected option
          $(selector).collapse('show');

      });
      $("#addForm").on('reset',function(e){
          $("#deleteMarker").hide();
          $('.inputType_hide').collapse('hide');
      })
      $("#addForm").submit(function(e) {
          e.preventDefault();

          let pId = $("#placeId").val();
          let pName = $("#placeName").val();
          let pLat = $("#placeLat").val();
          let pLng = $("#placeLng").val();
          let pDes = $("#placeDes").val();
          let pInput = $("#placeInputType").val();
          let pInputLabel = $("#input_"+pInput).val();
          let input = {
            "type": pInput,
            "label": pInputLabel
          }
          let locationElement ={
            "name": pName,
            "lat": pLat,
            "lng": pLng,
            "desc": pDes,
            "input": input
          }
          console.log(pId);
          if(pId !=''){
            locations[pId] = locationElement;
          }
          else{
            let marker;

            if(gMarkers.length!=0){
              marker = new google.maps.Marker({
                position:{lat: +pLat, lng: +pLng},
                draggable: true,
                map: map,
              });
            }
            else{
              marker = new google.maps.Marker({
                position:{lat: +pLat, lng: +pLng},
                draggable: true,
                map: map,
                icon: { path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
                        fillColor: "blue",
                        fillOpacity: 1,
                        strokeWeight: 0,
                        rotation: 0,
                        scale: 2,
                        anchor: new google.maps.Point(13, 21),
                      },
              });
            }
            const path = mapPolyLine.getPath();
            path.push(temp_latLng);

            gMarkers.push(marker);
            
            locations.push(locationElement);

            

            const infowindow = new google.maps.InfoWindow({
                content: '',
              });
            google.maps.event.addListener(marker, 'click', (function(marker) {
              return function() {
                let i = gMarkers.indexOf(marker);

                infowindow.close();
                infowindow.open({
                  anchor: marker,
                  map,
                  shouldFocus: false,
                });
                infowindow.setContent(locations[i].name);
                click_marker(marker,i);
              }
            })(marker));
            google.maps.event.addListener(marker, 'mouseover', (function(marker) {
                return function() {
                  let i = gMarkers.indexOf(marker);
                  infowindow.close();
                  infowindow.setContent(locations[i].name);
                  infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                  })
                }
              })(marker));
              google.maps.event.addListener(marker, 'mouseout', (function(marker) {
                return function() {
                  infowindow.close();
                }
              })(marker));

            google.maps.event.addListener(marker,'dragstart',(function(event){
              let i = gMarkers.indexOf(marker);
              infowindow.open({
                anchor: marker,
                map,
                shouldFocus: false,
              })
            }))
            google.maps.event.addListener(marker,'drag',function(event){
                let i = gMarkers.indexOf(marker);
                const path = mapPolyLine.getPath();
                path.setAt(i,event.latLng);
              })
            google.maps.event.addListener(marker,'dragend',(function(event) {
              const i = gMarkers.indexOf(marker);
              locations[i].lat = this.getPosition().lat();
              locations[i].lng = this.getPosition().lng();
              infowindow.close();
            }))
          }
          $("#addForm").trigger('reset');
          temp_makers.setMap(null);
          
      });

      function getDetailFromLocations(array){
        let i,l = array.length,detail = '';
        for(i = 0; i<l; i++){
          detail +="Địa điểm " +i+"."+"\n Tên địa điểm: "+array[i].name+"\n Mô tả:"+array[i].desc+"\n Hành động: "+array[i].input.label+"\n";
        }
        return detail;
      }
    </script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCqlYpOSuyeiwzpyhcJfivgBizL-DET_Dw&callback=initMap" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop