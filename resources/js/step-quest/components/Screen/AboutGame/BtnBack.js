import './BtnBack.css'
import React from 'react';
import { FaAngleLeft } from 'react-icons/fa';
import { useHistory } from 'react-router-dom';
const BtnBack = (props) => {
    const history = useHistory();
    const handleClick = () => {
        history.replace(`/`);
        location.reload();
    }

    return (
        <FaAngleLeft className="mr-3 back" onClick={handleClick} />
    );
};

export default BtnBack;