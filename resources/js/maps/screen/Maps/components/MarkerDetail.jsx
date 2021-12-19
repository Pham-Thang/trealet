import React, { useState, useRef, useEffect } from "react";
import { Carousel, Menu, Alert } from "antd";
import { EnvironmentOutlined, CameraOutlined } from "@ant-design/icons";
import MarkerInfo from "./MarkerInfo";
import MarkerUpload from "./MarkerUpload";
import { Drawer, Button } from "rsuite";
import { Message, toaster } from "rsuite";
import { getMaps, getGps, getKm, setZooCenter } from "../action";
import { useSelector, useDispatch } from "react-redux";

const { SubMenu } = Menu;

const MarkerDetail = ({ detail, onShowDetail, isShowDetail }) => {
  const trId = window.location.search.replace("?tr=", "");

  const dispatch = useDispatch();
  const ref = useRef();

  const [updatCheckIn, setUpdatCheckIn] = useState(false);

  const onClose = () => {
    onShowDetail(false, null);
    setCurrent("info");
  };

  useEffect(() => {
    setUpdatCheckIn(false);
  }, [detail]);

  const handleClick = (e) => {
    if (updatCheckIn) {
      dispatch(getMaps(trId));
    }
    setUpdatCheckIn(!updatCheckIn);
  };

  const renderIframeInput = (detail) => {
    console.log(detail);
    switch (detail?.input.type) {
      case "picture":
        return (
          <div style={{width: '100vh'}}>
            <iframe
              frameBorder="0"
              style={{
                position: "relative",
                height: 300,
                alignContent: "center",
                margin: "auto",
              }}
              src={`${window.location.origin}/input-picture?tr_id=${trId}&nij=${detail?.index}`}
              title="picture"
              allow="camera"
              width="100%"
            />
          </div>
        );
      case "audio":
        return (
          <div style={{width: '100vh'}}>
            <iframe
              frameBorder="0"
              style={{
                position: "relative",
                height: 220,
                alignContent: "center",
                margin: "auto",
              }}
              src={`${window.location.origin}/input-audio?tr_id=${trId}&nij=${detail?.index}`}
              title="audio"
              allow="microphone"
              width="100%"
            />
          </div>
        );
      case "qr":
        return (
          <div style={{width: '100vh'}}>
            <iframe
              onLoad={(e) => console.log(e)}
              // onSubmit="alert(this.contentWindow.location);"
              frameBorder="0"
              style={{ position: "relative",height: 300 }}
              src={`${window.location.origin}/input-qr?tr_id=${trId}&nij=${detail?.index}`}
              title="Scan QR code from camera"
              allow="camera"
              width="100%"
            />
          </div>
        );
      case "form":
        return (
          <div style={{width: '100vh'}}>
            <iframe
              ref={ref}
              frameBorder="0"
              style={{
                position: "relative",
                height: 280,
                margin: "auto",
              }}
              src={`${window.location.origin}/input-form?tr_id=${trId}&nij=${detail?.index}`}
              title="Input data from a form"
              allow="camera"
              width="100%"
            />
          </div>
        );
      default:
        return null;
    }
  };

  const renderViewInput = (detail) => {
    switch (detail?.input.type) {
      case "picture":
        return (
          <div
            style={{
              width: window.innerWidth - 34,
              height: "auto",
              marginTop: 15,
            }}
          >
            <h6 style={{margin: 10}}>
              Ảnh bạn đã gửi:
            </h6>
            <img src={`${window.location.origin}/${detail.data}`} />
          </div>
        );
      case "audio":
        return (
          <div style={{ width: window.innerWidth - 34, marginTop: 15 }}>
            <h6 style={{margin: 10}}>
              Audio bạn đã gửi:
            </h6>
            <audio controls>
              <source
                src={`${window.location.origin}/${detail.data}`}
                type="audio/ogg"
              />
            </audio>
          </div>
        );
      case "qr":
        return (
          <div style={{ marginTop: 15 }}>
            <h6 style={{margin: 10}}>Thông tin QR của bạn : </h6>
            <Message type="info" style={{ marginBottom: 15 }}>
              {detail?.data.scanneddata}
            </Message>
          </div>
        );
      case "form":
        return (
          <div style={{ marginTop: 15 }}>
            <h6 style={{margin: 10}}>Nội dung bạn đã gửi :</h6>
            <Message type="info" style={{ marginBottom: 15 }}>
              {detail?.data.comment}
            </Message>
          </div>
        );
      default:
        return null;
    }
  };

  return (
    <div style={{ margin: 17, justifyContent: "center", overflowY: "auto" }}>
      <h5 style={{ textAlign: "center", marginBottom : 20 }}>{detail?.name}</h5>
      <div>
        {!detail?.played || updatCheckIn ? (
          <div style={{ marginTop: 15 }}>
            <Message type="warning" style={{ marginBottom: 15 }}>
              {detail?.desc}
            </Message>
            {renderIframeInput(detail)}
            {updatCheckIn ? (
              <Button
                appearance="primary"
                onClick={handleClick}
                style={{ marginTop: 15 }}
              >
                {!updatCheckIn ? "Update" : "Done"}
              </Button>
            ) : null}
          </div>
        ) : (
          <div style={{ marginTop: 15 }}>
            <Alert
              message="Bạn đã hoàn thành check in"
              type="success"
              showIcon
            />
            <Message type="warning" style={{ marginTop: 15 }}>
              {detail?.desc}
            </Message>
            {renderViewInput(detail)}
            <Button
              appearance="ghost"
              onClick={handleClick}
              style={{ marginTop: 15 }}
            >
              Update
            </Button>
          </div>
        )}
      </div>
    </div>
  );
};

export default MarkerDetail;
