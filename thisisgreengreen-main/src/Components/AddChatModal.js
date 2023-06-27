import React, { useState, useCallback } from "react";
import { useDropzone } from "react-dropzone";
import { AiOutlineClose } from "react-icons/ai";
import "../Styles/modal_addChat_first.css";

const AddChatModal = () => {
  const onDrop = useCallback(acceptedFiles => {
    if(!acceptedFiles) {
      alert("사진 추가 실패");
    } else {
    console.log(acceptedFiles);
    alert("사진 추가 완료");
    }
  }, []);

  const { getRootProps, getInputProps, isDragActive } = useDropzone({onDrop}); 

  const [modalOpen, setModalOpen] = useState(false);

  const ChatToClose = () => {
    setModalOpen(false);
  };

  return (
    <div className="AddChatModal-container" onClick={ChatToClose}>
      <div className="modal-body" onClick={(e) => e.stopPropagation()}>
        <p className="addChat-text">채팅방 만들기</p>
        <button type="submit">
          <AiOutlineClose className="closeBtn" onClick={ChatToClose} />
        </button>
        <div className="chat-item-div">
          <span className="chat-room_name-text">채팅방 이름</span>
          <input
            type="text"
            placeholder="채팅방 이름을 입력하세요"
            name="chat_room_name"
            className="chat-room_name"
          />

          <span className="chat-room_img-text">채팅방 사진</span>
          <div className="file-layout-div" {...getRootProps()}>
            <input {...getInputProps()} />
            {
              <p className="acceptedImg-text">사진 추가</p>
            }
          </div>

          <button type="submit" className="chat-room-next-btn">
            다음
          </button>
        </div>
      </div>
    </div>
  );
};

export default AddChatModal;
