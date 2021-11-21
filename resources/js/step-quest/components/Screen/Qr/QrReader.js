import React, { Component } from 'react'
import './QrReader.css'
class QrReaderTVC extends Component {
  state = {
    result: 'No result',
    id: 1,
    nij: "abc"
  }

  componentDidMount() {
    // other 
    let iframe = window.document.getElementById("mainIframe");
    iframe.allow = "camera";
  }

  handleScan = data => {
    if (data) {
      this.setState({
        result: data
      })
    }
  }
  handleError = err => {
    console.error(err)
  }
  render() {
    var src = `https://trealet.com/input-qr?tr_id=${this.state.id}.'&nij='${this.state.nij}'`;
    const style = { position: 'relative', width: '90%' };
    return (
      <div>
        <iframe id="mainIframe" style={style} src={src}></iframe>
      </div>
    )
  }
}
export default QrReaderTVC;