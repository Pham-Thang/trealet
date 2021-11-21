import React, { Component } from 'react'
import { Button } from 'react-bootstrap';
import './ScreenResult.css';

class ScreenResult extends Component{
    constructor(props){
        super(props);
        this.state = {
            
        }

    }


    render(){
        return (
            <div className = "result">
                <div className = "result-title"><h5>Chúc mừng bạn đã hoàn thành trò chơi</h5></div>
                
                <div className = "result-content">
                    <p>Phần thưởng của bạn là một chiếc lắc tay thổ cẩm. Hãy
                        đến phòng lưu niệm để nhận phần quà này
                    </p>
                </div>
                <div className = "resuil-img">
                <img className = "resuil_img_img" src= {this.props.data.img} alt={"img"} />
                </div>
                <div className = "result-button">
                    <Button href = "/step-quest">Chơi Lại</Button>
                    <Button href = "/step-quest/register">Trang Chủ</Button>
                </div>
            </div>
            
        )
    }
}
export default ScreenResult;