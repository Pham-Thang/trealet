import React, { useState } from "react";
import { Drawer, Carousel, Menu } from "antd";
import {
  EnvironmentOutlined,
  CameraOutlined,
} from "@ant-design/icons";
import MarkerInfo from "./MarkerInfo";
import MarkerUpload from "./MarkerUpload";

const { SubMenu } = Menu;

const MarkerDetail = ({ detail, onShowDetail, isShowDetail }) => {

  const [current, setCurrent] = useState('info')

  const onClose = () => {
    onShowDetail(false, null);
    setCurrent('info')
  };

  const handleClick = (e) => {
    console.log("click ", e);
    setCurrent(e.key)
  };


  return (
    <div>
      <Drawer
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
      </Drawer>
    </div>
  );
};

export default MarkerDetail;
