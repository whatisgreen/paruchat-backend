import React, { useState } from "react";
import { AiOutlineClose } from "react-icons/ai";
import { IoMdAddCircleOutline } from "react-icons/io";
import "../Styles/modal_addChat_second.css";

const AddChatModal2 = (props) => {
  const { user, email } = props;

  const [modalOpen, setModalOpen] = useState(false);

  const ChatToClose = () => {
    setModalOpen(false);
  };

  return (
    <div className="AddChatModal2" onClick={ChatToClose}>
      <div className="modal-body2" onClick={(e) => e.stopPropagation()}>
        <p className="addChat-text2">채팅방 만들기</p>
        <button type="submit">
          <AiOutlineClose className="closeBtn2" onClick={ChatToClose} />
        </button>
        <div className="chat-item-div2">
          <span className="chat-room_user-invite-text">사용자 초대</span>
          <span>
            <IoMdAddCircleOutline className="IoMdAddCircleOutline" />
          </span>
          <input
            type="text"
            placeholder="박민규#0713"
            name="chat-room_user-invite"
            className="chat-room_user-invite"
          />

          <div className="chat-room_user-div">
            <div style={{ display: "block" }}>
              <span>박민규(mingyu0713@gmail.com)</span>
            </div>
          </div>

          <button type="submit" className="chat-room-finish-btn">
            만들기
          </button>
        </div>
      </div>
    </div>
  );
};

export default AddChatModal2;
