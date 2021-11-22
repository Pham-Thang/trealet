import React, { useState, useEffect } from "react";
import GoogleMap, {
  Map,
  InfoWindow,
  Marker,
  GoogleApiWrapper,
} from "google-map-react";
import { UserOutlined } from "@ant-design/icons";
import { Avatar, Image, Drawer, Button } from "antd";
import { geolocated } from "react-geolocated";
// import useGeoLocation from "../../../hooks/useGeoLocation";
import { GpsIcon2 } from "./Icons";

const MapView = () => {
  useEffect(() => {}, []);

  const [markers, setMarkers] = useState([]);
  const [geolocation, setGeolocation] = useState({ lat: "", lng: "" });
  const [center, setCenter] = useState({ lat: 20.86, lng: 105.91 });
  // const geolocation = useGeoLocation([]);
  const [mapRef, setMapRef] = useState(null);

  console.log("render");
  const addMarker = (location) => {
    console.log(location);
    let lat = location.lat;
    let lng = location.lng;
    let temp = markers;
    temp.push({ lat, lng });
    setMarkers(temp);
    console.log(markers);
  };

  const getGps = () => {
    navigator.geolocation.getCurrentPosition(
      (success) => {
        console.log("Latitude is :", success.coords.latitude);
        console.log("Longitude is :", success.coords.longitude);
        let temp = {
          lat: success.coords.latitude,
          lng: success.coords.longitude,
        };
        console.log("geo", typeof geolocation);
        console.log("temp", typeof geolocation);
        console.log(temp.lat == geolocation.lat);
        if (geolocation.lat !== temp.lat) {
          console.log("44");
          setGeolocation({
            lat: success.coords.latitude,
            lng: success.coords.longitude,
          });
          setCenter({
            lat: success.coords.latitude,
            lng: success.coords.longitude,
          });
        }
      },
      (error) => {
        console.log(error.message);
        alert(error.message);
      }
    );
  };

  const defaultProps = {
    center: {
      lat: 20.8642397,
      lng: 105.9164239,
    },
    zoom: 17,
  };

  return (
    <div className="Maps" style={{ marginTop: 20 }}>
      <Button type="primary" onClick={getGps}>
        GPS
      </Button>
      {/* {!props.isGeolocationAvailable ? (
        <div>Your browser does not support Geolocation</div>
      ) : !props.isGeolocationEnabled ? (
        <div>Geolocation is not enabled</div>
      ) : props.coords ? (
        <table>
          <tbody>
            <tr>
              <td>latitude</td>
              <td>{props.coords.latitude}</td>
            </tr>
            <tr>
              <td>longitude</td>
              <td>{props.coords.longitude}</td>
            </tr>
            <tr>
              <td>altitude</td>
              <td>{props.coords.altitude}</td>
            </tr>
            <tr>
              <td>heading</td>
              <td>{props.coords.heading}</td>
            </tr>
            <tr>
              <td>speed</td>
              <td>{props.coords.speed}</td>
            </tr>
          </tbody>
        </table>
      ) : (
        <div>Getting the location data&hellip; </div>
      )} */}
      <div style={{ height: "90vh", width: "100%" }}>
        <GoogleMap
          bootstrapURLKeys={{
            key: "AIzaSyB-lfJYx98EARbL-SCEWy9TU59USvM3QZY",
          }}
          options={{
            gestureHandling: "greedy",
            disableDefaultUI: true,
            fullscreenControl: true,
            style: [
              {
                featureType: "poi",
                elementType: "labels",
                stylers: [{ visibility: "off" }],
              },
            ],
          }}
          onLoad={(map) => setMapRef(map)}
          center={center}
          onCenterChanged={() => setCenter(mapRef.getCenter().toJSON())}
          defaultZoom={defaultProps.zoom}
          gestureHandling={false}
          onClick={(e) => addMarker(e)}
        >
          <GpsIcon2 lat={geolocation.lat} lng={geolocation.lng} />
          {/* {markers.length > 0
            ? markers.map((item) => {
                console.log(item);
                return (
                  <GpsIcon lat={item.position.lat} lng={item.position.lng} />
                );
              })
            : null} */}
        </GoogleMap>
      </div>
    </div>
  );
};

export default MapView;
