import React from "react";

export const GpsIcon = ({ text }) => {
  return (
    <div>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="27"
        height="27"
        x="0"
        y="0"
        viewBox="0 0 172 172"
      >
        <defs>
          <linearGradient
            id="color-1_upQcQm7SYVlh_gr1"
            x1="35.325"
            x2="136.675"
            y1="35.325"
            y2="136.675"
            gradientUnits="userSpaceOnUse"
          >
            <stop offset="0" stopColor="#33bef0"></stop>
            <stop offset="1" stopColor="#0a85d9"></stop>
          </linearGradient>
        </defs>
        <g
          fill="none"
          strokeMiterlimit="10"
          fontFamily="none"
          fontSize="none"
          fontWeight="none"
          textAnchor="none"
          style={{ mixBlendMode: "normal" }}
        >
          <path d="M0 172V0h172v172z"></path>
          <path
            fill="url(#color-1_upQcQm7SYVlh_gr1)"
            d="M157.667 86c0 39.578-32.09 71.667-71.667 71.667-39.578 0-71.667-32.09-71.667-71.667 0-39.578 32.09-71.667 71.667-71.667 39.578 0 71.667 32.09 71.667 71.667z"
          ></path>
          <path
            fill="#000"
            d="M47.755 89.11l28.108 7.027 7.027 28.108c1.913 7.658 12.566 8.263 15.336.874l24.64-65.704c2.407-6.417-3.863-12.685-10.281-10.28L46.88 73.774c-7.39 2.77-6.783 13.42.874 15.336z"
            opacity="0.05"
          ></path>
          <path
            fill="#000"
            d="M48.103 86.423l29.981 7.496 7.497 29.978c1.25 5.006 8.213 5.404 10.026.57l24.804-66.141c1.576-4.203-2.53-8.306-6.733-6.73L47.537 76.4c-4.838 1.81-4.44 8.772.566 10.023z"
            opacity="0.07"
          ></path>
          <path
            fill="#fff"
            d="M114.76 54.058L48.178 79.027c-2.272.853-2.086 4.124.269 4.712L80.299 91.7l7.962 31.852c.588 2.355 3.863 2.54 4.712.27l24.969-66.583c.745-1.985-1.197-3.927-3.182-3.182z"
          ></path>
        </g>
      </svg>
    </div>
  );
};

export const GpsIcon2 = ({ text }) => {
  return (
    <div
      style={{
        height: "40px",
        width: "40px",
        borderRadius: "20px",
        overflow: "hidden",
        backgroundColor: "rgba(0, 122, 255, 0.1)",
        border: "1px solid rgba(0, 122, 255, 0.3)",
        alignItems: "center",
        justifyContent: "center",
      }}
    >
      <div
        style={{
          marginTop: "12px",
          marginLeft: "12px",
          height: "14px",
          width: "14px",
          border: "2px solid white",
          borderRadius: "9px",
          overflow: "hidden",
          backgroundColor: "#007AFF",
        }}
      ></div>
    </div>
  );
};

export const MackerIcon = ({ text }) => {
  return (
    <div>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="25"
        height="25"
        x="0"
        y="0"
        viewBox="0 0 48 48"
      >
        <linearGradient
          id="iu22Zjf0u3e5Ts0QLZZhJa_uzeKRJIGwbBY_gr1"
          x1="11.274"
          x2="36.726"
          y1="9.271"
          y2="34.723"
          gradientUnits="userSpaceOnUse"
        >
          <stop offset="0" stopColor="#d43a02"></stop>
          <stop offset="1" stopColor="#b9360c"></stop>
        </linearGradient>
        <path
          fill="url(#iu22Zjf0u3e5Ts0QLZZhJa_uzeKRJIGwbBY_gr1)"
          d="M36.902 34.536C40.052 31.294 42 26.877 42 22c0-9.94-8.06-18-18-18S6 12.06 6 22c0 4.877 1.948 9.294 5.098 12.536.018.019.03.04.048.059l.059.059.142.142 11.239 11.239a2 2 0 002.828 0l11.239-11.239.142-.142.059-.059c.019-.019.031-.041.048-.059z"
        ></path>
        <radialGradient
          cx="24"
          cy="22.5"
          r="9.5"
          gradientUnits="userSpaceOnUse"
        >
          <stop offset="0.177"></stop>
          <stop offset="1" stopOpacity="0"></stop>
        </radialGradient>
        <circle cx="24" cy="22.5" r="9.5" fill="url(#undefined)"></circle>
        <circle cx="24" cy="22" r="8" fill="#f9f9f9"></circle>
        <radialGradient
          cx="23.842"
          cy="43.905"
          r="13.637"
          gradientUnits="userSpaceOnUse"
        >
          <stop offset="0.177"></stop>
          <stop offset="1" stopOpacity="0"></stop>
        </radialGradient>
        <path
          fill="url(#undefined)"
          d="M24 30c-4.747 0-8.935 2.368-11.467 5.982l10.052 10.052a2 2 0 002.828 0l10.052-10.052C32.935 32.368 28.747 30 24 30z"
        ></path>
        <path
          fill="#de490d"
          d="M24 32c-4.196 0-7.884 2.157-10.029 5.42l8.615 8.615a2 2 0 002.828 0l8.615-8.615C31.884 34.157 28.196 32 24 32z"
        ></path>
      </svg>
    </div>
  );
};
