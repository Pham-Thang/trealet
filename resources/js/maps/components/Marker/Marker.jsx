import React, { useState } from "react";
import CameraIcon from "./CameraIcon";
import AudioIcon from "./AudioIcon";
import QrIcon from "./QrIcon";
import FormIcon from "./FormIcon";

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
  // console.log(props.detail);
  const color = props.detail.played ? "#10F61C" : "#F63810";
  return (
    <div
      style={{
        opacity: props.detail.played ? 0.75: 1,
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
          boxShadow: `0 0 0 3px ${color}`,
          borderRadius: size * 0.2,
        }}
      >
        {props.detail?.input.type === "qr" ? <QrIcon /> : null}
        {props.detail?.input.type === "picture" ? <CameraIcon /> : null}
        {props.detail?.input.type === "audio" ? <AudioIcon /> : null}
        {props.detail?.input.type === "form" ? <FormIcon /> : null}
      </div>
      <div
        style={{
          height: size * 0.1,
          width: size * 0.1,
          borderStyle: "solid",
          borderColor: `${color} transparent transparent transparent`,
          borderWidth: `${size * 0.1}px ${size * 0.05}px 0 ${size * 0.05}px`,
          margin: "auto",
        }}
      ></div>
    </div>
  );
};

export default Marker;
