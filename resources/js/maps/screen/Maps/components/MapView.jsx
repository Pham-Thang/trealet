import React, { useState, useEffect, useRef, useCallback } from "react";
import { useSelector, useDispatch } from "react-redux";
import GoogleMap, { fitBounds } from "google-map-react";
import GpsIcon from "../../../components/icons";
import { AimOutlined } from "@ant-design/icons";
import Marker from "../../../components/Marker";
import { getGeolocation, getGps,getKm } from "../action";
import select from "../../../utils/select";
import { getDistanceFromLatLonInKm } from "../../../utils/util";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import { message, Button } from "antd";
import { mapKeys } from "lodash";


const MapView = (props) => {
  const { maps, gps, isGps, ganNhat,km } = useSelector((state) => ({
    maps: select(state, "mapsReducer", "maps"),
    gps: select(state, "mapsReducer", "gps"),
    isGps: select(state, "mapsReducer", "isGps"),
    ganNhat: select(state, "mapsReducer", "ganNhat"),
    km: select(state, "mapsReducer", "km"),

  }));
  const dispatch = useDispatch();

  useEffect(() => {
    const intervalGps = setInterval(() => {
      dispatch(getGps(navigator))
    }, 1000);
    return () => clearInterval(intervalGps);
  }, []);

  useEffect(() => {
    const interval = setInterval(() => {
      dispatch(getKm())
    }, 3500);
    return () => clearInterval(interval);
  }, []);

  useEffect(() => {
    const test = setInterval(() => {
      // message.info(,{ marginTop: 50});
      if(km < 15){
        message.info({
          content: `${ganNhat.name} cách bạn ${km} km`,
          style: { marginTop: 60 },
        })
      }
    }, 15000);
    return () => clearInterval(test);
  }, [ganNhat]);



  // const [zoom, setZoom] = useState(16);
  const [size, setSize] = useState(50);
  const [map, setMap] = useState(null);

  const [center, setCenter] = useState({
    lat: 21.038272480898943,
    lng: 105.78283957815938,
  });

  const onGetGps = () => {
    dispatch(getGps(navigator));
  };

  const onZoom = (e) => {
    let metersPerPx =
      (156543.03392 * Math.cos((e.center.lat * Math.PI) / 180)) /
      Math.pow(2, e.zoom);
    // setZoom(e.zoom);
    setSize(size);
  };
  // const onLoad = useCallback((map) => setMap(map), []);
  // const bounds = new maps.LatLngBounds();
  const changeMap = ({ center, zoom, bounds }) => {
    console.log(bounds);
  };

  const size1 = {
    width: 640, // Map width in pixels
    height: 380, // Map height in pixels
  };
  // const { center, zoom } = fitBounds(foundMarkers, size1);

  return (
    <div style={{ height: window.innerHeight - 72, width: "100%" }}>
      <GoogleMap
        bootstrapURLKeys={{
          key: "AIzaSyB-lfJYx98EARbL-SCEWy9TU59USvM3QZY",
        }}
        options={{
          gestureHandling: "greedy",
          disableDefaultUI: true,
          fullscreenControl: false,
          style: [
            {
              featureType: "poi",
              elementType: "labels",
              stylers: [{ visibility: "off" }],
            },
          ],
        }}
        // onLoad={onLoad}
        // bounds={oki}
        center={center}
        zoom={16}
        gestureHandling={false}
        // onChange={changeMap}
        // onClick={(e) => {
        //   console.log(e);
        // }}
      >
        {maps.map((item, index) => {
          let detail = item;
          detail.index = index;
          return (
            <Marker
              key={index}
              // zoom={zoom}
              detail={detail}
              lat={item.lat}
              lng={item.lng}
              onClickMarker={props.onShowDetail}
            />
          );
        })}
        {gps !== null ? <GpsIcon lat={gps.lat} lng={gps.lng} /> : null}
      </GoogleMap>

      <div
        style={{
          position: "relative",
          float: "right",
          top: -40,
          left: -15,
          height: 30,
          width: 30,
          borderRadius: 5,
          backgroundColor: "#FFF",
          display: "inline-flex",
          justifyContent: "center",
          alignItems: "center",
          boxShadow:
            "rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px",
        }}
      >
        <AimOutlined
          style={{ fontSize: "20px", color: !isGps ? "#7DCBE2" : "#08c" }}
          onClick={onGetGps}
        />
      </div>
      <ToastContainer />
    </div>
  );
};

export default MapView;
