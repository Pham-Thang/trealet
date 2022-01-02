import React, { Component } from "react";
import "./Answer.css";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
class Answer extends Component {
  constructor(props) {
    super(props);
    this.state = {
      isLoading: false,
    };
  }
  checkAnswer(answer) {
    if (
      answer &&
      !this.props.data.IsCheck &&
      !this.state.isLoading &&
      !this.props.data.fulltime
    ) {
      this.setState({ isLoading: true });
      this.props.data.IsCheck = true;
      this.props.isCheckAnswer();
      if (this.props.data.answer == answer.id) {
        answer.isCorrect = true;
        // tăng điểm khi trả lời đúng
        // this.props.handleScore(this.props.data.score);
        this.props.handleScore(parseInt(this.props.data.score));
        this.setState({ isLoading: false });

        setTimeout(() => {
          toast.success("Chính xác ! Chúc mừng bạn", {
            position: "top-center",
            autoClose: 3000,
            theme: "colored",
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
          });
        }, 300);
      } else {
        answer.isWrong = true;
        this.setState({ isLoading: false });
        setTimeout(() => {
          toast.error("Sai rồi ! Hãy cố lên nhé", {
            position: "top-center",
            autoClose: 3000,
            theme: "colored",
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
          });
        }, 300);
      }
    }
  }
  render() {
    const listItems = this.props.data.ListOption.map((answer) => (
      <div
        key={answer.id}
        className={`answer-text ${answer.isCorrect ? "correct" : ""} ${
          answer.isWrong ? "wrong" : ""
        }`}
        onClick={() => this.checkAnswer(answer)}
      >
        {" "}
        {answer.text}{" "}
      </div>
    ));
    return (
      <div className="q-answer">
        {" "}
        {this.props.data.img ? (
          <div className="img-question flex-c-m">
            <img className="img-q" src={this.props.data.img} />{" "}
          </div>
        ) : undefined}{" "}
        <div className="question mt-4"> {this.props.data.question} </div>{" "}
        <div className="list-option"> {listItems} </div> <ToastContainer />
      </div>
    );
  }
}
export default Answer;
