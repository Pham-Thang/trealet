import React, { Component } from "react";
import './ScreenQr.css';
import { Button } from "react-bootstrap";
import QrReaderTVC from "./QrReader.js"
class ScreenQr extends Component {
    constructor(props){
        super(props);
        this.state = {
          isHide : true
        };
        console.log(this.props)
        this.onClick= this.onClick.bind(this);
      }
      
      onClick (){
        //   this.props.toggle(true)
        this.setState({
          isHide: !this.state.isHide
        })
      }
    render() {
        return (
            <div >

                {
                    this.state.isHide ?
                        (
                            <div className = "Qrreader">
                                <div className = "Qrreader_title">
                                {/* <p > {this.props.data.title}</p> */}
                                <p>Hãy đến địa điểm A quét mã QR và trả lời các câu hỏi để nhận được phần quà từ Bảo Tàng !</p>
                                </div>
                               
                                <Button onClick={this.onClick}>Qr Code</Button>
                            </div>
                        ) : (<QrReaderTVC />)

                }
            </div>
        )
    }

}
export default ScreenQr;