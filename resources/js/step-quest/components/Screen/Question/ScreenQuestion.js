import React, { Component } from "react";
import './ScreenQuestion.css';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

class ScreenQuestion extends Component {
    constructor(props) {
        super(props);
        this.state = {
            traloi: {
                datraloi: false,
                dung: false,
                index: -1
            }

        }
    }
    // handleSelect (){
    //     if(selected === dapan){
    //         return " select";
    //     }
    //     else
    //     return "wrong";

    // }
    // handleClick (dapan, index){

    //     if(this.props.data.answer === dapan)
    //     {
    //          this.setState({
    //              datraloi : true,
    //              dung : true,
    //              index : index
    //          })
    //     }
    //rafce
    // }
    showToast(){
        toast.success("Chuc mung ban", {
            position: "top-center",
            autoClose: 5000,
            theme: "colored",
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
            });
    }
    render() {
        var that = this;
        return (
            <div>
                <div className="imgGame">
                    <img className="img" src={this.props.data.img} alt={"img"} />
                </div>
                <div className="Question">
                    {this.props.data.Question}
                </div>
                <div className="Option">
                    <div className=" box_1">
                        <div className="option" onClick={that.showToast} >
                            <p> {this.props.data.Option1}</p>
                        </div>
                        <div className="option" onClick = {toast} >
                            <p> {this.props.data.Option2}</p>
                        </div>
                    </div>
                    <div className=" box_2">
                        <div className="option" onClick = {toast}>
                            <p> {this.props.data.Option3}</p>
                        </div>
                        <div className="option" onClick = {toast}>
                            <p> {this.props.data.Option4}</p>
                        </div>
                    </div>

                    );
                </div>
                <ToastContainer/>
            </div>
        )
    }

}
export default ScreenQuestion;