import React, { useState } from "react";
import { Carousel, Menu } from "antd";
import { EnvironmentOutlined, CameraOutlined } from "@ant-design/icons";
import MarkerInfo from "./MarkerInfo";
import MarkerUpload from "./MarkerUpload";
import { Drawer, Button } from "rsuite";
import { Message, toaster } from "rsuite";

const { SubMenu } = Menu;

const MarkerDetail = ({ detail, onShowDetail, isShowDetail }) => {
  const [current, setCurrent] = useState("info");

  const onClose = () => {
    onShowDetail(false, null);
    setCurrent("info");
  };

  const handleClick = (e) => {
    console.log("click ", e);
    setCurrent(e.key);
  };

  const trId = window.location.search.replace("?tr=", "");
  return (
    <div>
      <Drawer
        autoFocus
        size={"lg"}
        placement={"bottom"}
        open={isShowDetail}
        onClose={onClose}
      >
        <Drawer.Header>
          <Drawer.Title>{detail?.name}</Drawer.Title>
        </Drawer.Header>
        <Drawer.Body>
          <div>
            {detail?.input.type === "pictu" ? (
              <>
                <Message type="success" style={{ marginBottom: 15 }}>
                  {detail?.desc}
                </Message>
                <iframe
                  frameBorder="0"
                  style={{ position: "relative", width: "100%", height: 250 }}
                  src={`${window.location.origin}/input-picture?tr_id=${trId}&nij=${detail?.index}`}
                  title="picture"
                  allow="camera"
                  width="300px"
                />
              </>
            ) : null}
            {detail?.input.type === "form" ? (
              <>
                <Message type="error" style={{ marginBottom: 15 }}>
                  {detail?.desc}
                </Message>
                <iframe
                  frameBorder="0"
                  style={{ position: "relative", width: "100%", height: 250 }}
                  src={`${window.location.origin}/input-form?tr_id=${trId}&nij=${detail?.index}`}
                  title="Input data from a form"
                  allow="camera"
                  width="300px"
                />
              </>
            ) : null}
            {detail?.input.type === "audio" ? (
              <>
                <Message type="warning" style={{ marginBottom: 15 }}>
                  {detail?.desc}
                </Message>
                <iframe
                  frameBorder="0"
                  style={{ position: "relative", width: "100%", height: 180 }}
                  src={`${window.location.origin}/input-audio?tr_id=${trId}&nij=${detail?.index}`}
                  title="audio"
                  allow="microphone"
                  width="300px"
                />
              </>
            ) : null}
            {detail?.input.type === "qr" ? (
              <>
                <Message type="info" style={{ marginBottom: 15 }}>
                  {detail?.desc}
                </Message>
                <iframe
                  frameBorder="0"
                  style={{ position: "relative", width: "100%", height: 300 }}
                  src={`${window.location.origin}/input-qr?tr_id=${trId}&nij=${detail?.index}`}
                  title="Scan QR code from camera"
                  allow="camera"
                  width="300px"
                />
              </>
            ) : null}
          </div>
        </Drawer.Body>
      </Drawer>

      {/* <Drawer
        title={detail ? detail.title : "null"}
        placement={"bottom"}
        height="70vh"
        onClose={onClose}
        visible={isShowDetail}
      >
        <div style={{ height: 800, marginTop: -27 }}>
          <Menu
            onClick={handleClick}
            selectedKeys={[current]}
            mode="horizontal"
          >
            <Menu.Item title='info' key="info" icon={<EnvironmentOutlined style={{fontSize: 20}}/>}>
              info
            </Menu.Item>
            <Menu.Item title='upload' key="upload" icon={<CameraOutlined style={{fontSize: 20}}/>}>
              upload
            </Menu.Item>
          </Menu>
         {current === 'info' ? 
         <MarkerInfo detail={detail}/>:<MarkerUpload/>}
        </div>
      </Drawer> */}
    </div>
  );
};

export default MarkerDetail;
