import React, { Component } from "react";
import './ScreenDisplay.css';

class ScreenDisplay extends Component {
    constructor(props) {
        super(props);
        this.state = {

        }
        console.log(this.props);
    }
    render() {
        return (
            <div >
                <div className="imgGame">
                    <img className = "display-img" src= {this.props.data.img} alt={"img"} />
                </div>
                <div className = "name">
                    <h5>{this.props.data.name}</h5>
                    
                </div>
                <div className="des">
                    <p>Tôi không hiểu tại sao bạn nghĩ rằng đây là câu trả lời chính xác. Tôi vừa thử câu trả lời này và câu trả lời của 
                        Claireblani và câu trả lời của claire đã hoạt động trong khi điều này thì không. Câu trả lời này chỉ hoạt động nếu 
                        hình ảnh nằm trong thư mục công cộng. Hình ảnh của tôi có nên vào thư mục công cộng không? @Sami</p>
                </div>
            </div>

        )
    }

}
export default ScreenDisplay;