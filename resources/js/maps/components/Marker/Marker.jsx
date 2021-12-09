import React, { useState } from "react";
import CameraIcon from "./CameraIcon"
import AudioIcon from "./AudioIcon";
import QrIcon from './QrIcon';
import FormIcon from './FormIcon';

const greatPlaceStyle = {
  position: "absolute",
  transform: "translate(-10%, -10%)",
};

const Marker = (props) => {
  // const [size, setstate] = useState(65)
  const onClick = () => {
    props.onClickMarker(true, props.detail);
  };
  const size = 80;
  return (
    <div
      style={{
        height: size,
        width: size,
        position: "absolute",
        marginTop: size * -0.5,
        marginLeft: size * -0.5,
        transform: "translate(-10%, -10%)",
        display: props.zoom < 14 ? "none" : "",
      }}
    >
      <div
        onClick={onClick}
        style={{
          margin: "auto",
          height: size * 0.4,
          width: size * 0.4,
          backgroundColor: "#FFF",
          boxShadow: "rgba(0, 0, 0, 0.56) 0px 22px 70px 0px",
          borderRadius: size * 0.2,
        }}
      >
        {props.detail?.input.type === 'qrcode' ? <QrIcon/> : null} 
        {props.detail?.input.type === 'camera' ? <CameraIcon/> : null} 
        {props.detail?.input.type === 'audio' ? <AudioIcon/> : null} 
        {props.detail?.input.type === 'form' ? <FormIcon/> : null} 
      </div>
      <div
        style={{
          height: size * 0.1,
          width: size * 0.1,
          borderStyle: "solid",
          borderColor: "#FFF transparent transparent transparent",
          borderWidth: `${size * 0.1}px ${size * 0.05}px 0 ${size * 0.05}px`,
          margin: "auto",
          boxShadow: "rgba(0, 0, 0, 0.56) 0px 22px 70px 4px",
        }}
      ></div>
    </div>
  );
};

export default Marker;
