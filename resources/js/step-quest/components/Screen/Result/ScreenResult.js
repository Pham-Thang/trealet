import React, { Component } from 'react';
import { Button } from 'react-bootstrap';
import './ScreenResult.css';

class ScreenResult extends Component{
    constructor(props){
        super(props);
    }

    replay() {
        location.reload();
    }


    render(){
        return (
            <div className = "result">
                <div className = "result-title"><h5>Chúc mừng bạn đã hoàn thành trò chơi</h5>
                <h5>Số điểm của bạn là: {this.props.data.score}</h5>
                </div>
                
                <div className = "result-content">
                <p>
                    Phần thưởng của bạn là một chiếc lắc tay thổ cẩm. Hãy chụp lại màn hình và
                        đến phòng lưu niệm để nhận phần quà này
                    </p>
                    
                </div>
                <div className = "resuil-img">
                {/* <img className = "resuil_img_img" src= 'https://i.gifer.com/origin/92/92fd00a94c72f6968d77d048fb514aa5_w200.gif' alt={"img"} /> */}
                <img className = "resuil_img_img" src= 'https://i.pinimg.com/originals/ab/c8/05/abc805563d75437aa698b7c0df476302.gif' alt={"img"} />
                </div>
                <div className = "result-button">
                    <Button onClick={() => this.replay()} className="btn-reverse">
                        Chơi Lại
                    </Button>
                    <Button href = "/">Trang Chủ</Button>
                </div>
            </div>
            
        )
    }
}
export default ScreenResult;