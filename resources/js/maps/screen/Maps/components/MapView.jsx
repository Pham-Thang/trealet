import React, { useState, useEffect, useRef, useCallback } from "react";
import { useSelector, useDispatch } from "react-redux";
import GoogleMap, { fitBounds } from "google-map-react";
import GpsIcon from "../../../components/icons";
import { AimOutlined } from "@ant-design/icons";
import Marker from "../../../components/Marker";
import { getGeolocation, getGps, getKm, setZooCenter } from "../action";
import select from "../../../utils/select";
import { getDistanceFromLatLonInKm } from "../../../utils/util";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import { message, Button } from "antd";


const MapView = (props) => {
  const { maps, gps, isGps, ganNhat,km, center, zoom } = useSelector((state) => ({
    maps: select(state, "mapsReducer", "maps"),
    gps: select(state, "mapsReducer", "gps"),
    isGps: select(state, "mapsReducer", "isGps"),
    ganNhat: select(state, "mapsReducer", "ganNhat"),
    km: select(state, "mapsReducer", "km"),
    center: select(state, "mapsReducer", "center"),
    zoom: select(state, "mapsReducer", "zoom"),

  }));
  const dispatch = useDispatch();

  useEffect(() => {
    const intervalGps = setInterval(() => {
      dispatch(getGps(navigator))
    }, 777);
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
      if(km < 30){
        message.loading({
          content: `${ganNhat.name} cách bạn ${(km.toFixed(4)*10000)%1000} m`,
          style: { marginTop: 60 },
          duration: 4,
        })
      }
    }, 11111);
    return () => clearInterval(test);
  }, [ganNhat]);

  const onGetGps = () => {
    dispatch(getGps(navigator));
  };

  const changeMap = ({ center, zoom, bounds }) => {
    dispatch(setZooCenter(zoom,center));
  };

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
        center={center}
        zoom={zoom}
        gestureHandling={false}
        onChange={changeMap}
      >
        {maps.map((item, index) => {
          let detail = item;
          detail.index = index;
          return (
            <Marker
              zoom={zoom}
              key={index}
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
