import React, { Component } from "react";
import "./ScreenDisplay.css";
import Speech from "react-speech";

class ScreenDisplay extends Component {
  constructor(props) {
    super(props);
    this.state = {};
    console.log(this.props);
  }
  render() {
    return (
      <div className="ScrDisplay">
        <div className="imgGame">
          <img className = "display-img" src= {this.props.data.image} alt={"img"} />
          {/* <img
            className="display-img"
            src="https://hutc.org/uploads/Resource/van-hoa-cong-chieng-tay-nguyen2.jpg"
          ></img> */}
        </div>
        <div className="name">
          <h4>{this.props.data.title}</h4>
        </div>
        <div className="des">
          {/* <Speech
            stop={true}
            text={this.props.data.description}
            lang="vi-VN"
          /> */}
          <p>{this.props.data.description}</p>
        </div>
      </div>
    );
  }
}
export default ScreenDisplay;