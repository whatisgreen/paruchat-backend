import React, { useState } from "react";
import "../Styles/signup.css";
import logo from "../images/로고.png";
import { AiOutlineEye, AiOutlineEyeInvisible } from "react-icons/ai";
import { Link } from "react-router-dom";

const SignUp = ({}) => {
  const [email, setEmail] = useState("");
  const [nick, setNick] = useState("");
  const [password, setPassword] = useState("");
  const [passwordCheck, setPasswordCheck] = useState("");

  const [pw, setPw] = useState({
    type: "password",
    visible: false,
  });

  const [pwChk, setPwChk] = useState({
    type: "password",
    visible: false,
  });

  
  const [errors, setErrors] = useState({
    emailError: false,
    nickError: false,
    passwordError: false,
    passwordCheck: false,
  });

  const handlePwView = (e) => {
    setPw(() => {
      if (!pw.visible) {
        return { type: "text", visible: true };
      } else {
        return { type: "password", visible: false };
      }
    });
  };

  const handlePwChkView = (e) => {
    setPwChk(() => {
      if (!pwChk.visible) {
        return { type: "text", visible: true };
      } else {
        return { type: "password", visible: false };
      }
    });
  };

  const emailHandler = (e) => {
    if (!email.match("@") && !email.match(".")) {
      setErrors({
        emailError: true,
      });
    } else if (email.match("@") && email.match(".")) {
      setErrors({
        emailError: false,
      });
    }
    setEmail(e.target.value);
  };

  const nickHandler = (e) => {
    if (nick === "") {
      setErrors({
        ...errors,
        nickError: true,
      });
    } else if (nick !== "") {
      setErrors({
        nickError: false,
      });
    }
    setNick(e.target.value);
  };

  const passwordHandler = (e) => {
    if (password === "") {
      setErrors({
        ...errors,
        passwordError: true,
      });
    } else if (password !== "") {
      setErrors({
        passwordError: false,
      });
    }
    setPassword(e.target.value);
  };

  const passwordCheckHandler = (e) => {
    setPasswordCheck(e.target.value);
    if (password === e.target.value) {
      setErrors({
        ...errors,
        passwordCheckError: false,
      });
    } else {
      setErrors({
        passwordCheckError: true,
      });
    }
  };

  return (
    <div className="signUp-container">
      <div className="signUp-form">
        <div className="logo-div-sign">
          <img src={logo} alt="logo" className="paru-chat-img" />
          <p className="paru-chat-text">Paru Chat</p>
        </div>
        <div className="input-div-sign">
          <input
            type="text"
            placeholder="E-mail (ex: mingyu1234@gmail.com)"
            className="email-input"
            name="email"
            onChange={emailHandler}
          />
          {errors.emailError && (
            <span
              className="color-validation"
              style={{ 
                fontSize: "13px",
                position: "relative", 
                top: "3px" }}
            >
              이메일 형식에 맞게 입력해주세요.
            </span>
          )}
          <input
            type="text"
            placeholder="Nickname"
            className="name-input"
            name="nickname"
            onChange={nickHandler}
          />
          {errors.nickError && (
            <span
              className="color-validation"
              style={{ 
                fontSize: "13px", 
                position: "relative", 
                top: "3px" }}
            >
              닉네임을 입력해주세요.
            </span>
          )}
          <input
            type={pw.type}
            placeholder="Password"
            className="pw-input"
            name="password"
            onChange={passwordHandler}
          />
          {errors.passwordError && (
            <span
              className="color-validation"
              style={{
                fontSize: "13px",
                position: "relative",
                top: "3px",
              }}
            >
              비밀번호를 입력해주세요.
            </span>
          )}
          <span onClick={handlePwView}>
            {pw.visible ? (
              <span className="no_visible-signUp">
                <AiOutlineEyeInvisible />
              </span>
            ) : (
              <span className="visible-signUp">
                <AiOutlineEye />
              </span>
            )}
          </span>
          <input
            type={pwChk.type}
            placeholder="Password Check"
            className="pw_chk-input"
            name="password"
            onChange={passwordCheckHandler}
          />
          {errors.passwordCheck && (
            <span
              className="color-validation"
              style={{
                fontSize: "13px",
                position: "relative",
                top: "3px",
              }}
            >
              비밀번호가 일치한지 확인해주세요.
            </span>
          )}
          <span onClick={handlePwChkView}>
            {pwChk.visible ? (
              <span className="no_visible-signUp_chk">
                <AiOutlineEyeInvisible />
              </span>
            ) : (
              <span className="visible-signUp_chk">
                <AiOutlineEye />
              </span>
            )}
          </span>

          <input type="submit" value="가입하기" className="signUp-btn" />

          <Link to="/login">
            <p className="login-text">로그인하기</p>
          </Link>
        </div>
      </div>
    </div>
  );
};

export default SignUp;
