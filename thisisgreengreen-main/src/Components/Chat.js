import React, { useState } from 'react'
import { Link } from "react-router-dom";
import logo from "../images/로고.png";
import '../Styles/chat.css';
import ChatRoomItem from './ChatRoomItem';
import FuckYouBitch from './FuckYouBitch';
import { ChatSendForm } from './ChatSendForm';
import { useRef } from "react";
import ChatMembers from '../Components/ChatMembers'

const Chat = () => {
  const [chatList, setChatList] = useState([]);
  //추후 수정
  const [chatListCnt, setChatListCnt] = useState(3);

  const [lastChattingMember, setLastChattingMember] = useState('');
  const scrollRef = useRef(); // ChatWrapper Element    

  //추후 수정
  const chattingRoomList = () => {
    const result = []
    for (let i = 0; i < 3; i++) {
      result.push(<ChatRoomItem logo={logo} title='개발자 잡담방' content='(사진)' n='1' />);
    }
    return result;
  }
  //추후 수정
  const ChatMembers = () => {
    const result = [];
    let last = '';
    const data = [{ 'profile': '임재현', 'username': '임재현' }, { 'profile': '박민규', 'username': '박민규' }, { 'profile': '박민규', 'username': '박경민' }]

    for (let i = 0; i < data.length; i++) {
      result.push(<ChatMembers key={i} name={data[i]['profile']} last={last} content={data[i]['username']} />);
      last = data[i]['name'];
    }

    return result;
  }

  const chattingHistory = () => {
    const result = [];
    let last = '';
    const data = [{ 'name': '임재현', 'content': 'ㅋㅋㅋ' }, { 'name': '박민규', 'content': '우흥' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }, { 'name': '박민규', 'content': '집에 가고싶다!!' }]
    for (let i = 0; i < data.length; i++) {
      if (data[i]['name'] === '임재현') {
        result.push(<FuckYouBitch who='me' key={i} name={data[i]['name']} last={last} content={data[i]['content']} />);
      } else {
        result.push(<FuckYouBitch who='other' key={i} name={data[i]['name']} last={last} content={data[i]['content']} />);
      }
      last = data[i]['name'];
    }
    return result;
  }

  return (
    <div>
      <div className='chat-room'>
        <div className='chat-title'>
          채팅방({chatListCnt})
        </div>
        <div className='chat-bottom'>
          <div className='chat-room-list'>
            {chattingRoomList()}
            <div className='chat-room-new'>
              새로운 채팅방 만들기
            </div>
          </div>
        </div>
      </div>
      <div className='chat-list'>
        <div className='chat-title'>
          개발자 잡담방
        </div>
        <div className='fuckYou_bitch'>
          <div className='chat-list-history' ref={scrollRef}>
            {chattingHistory()}
          </div>
          <ChatSendForm />
        </div>
      </div>
      <div className='chat-members'>
      <div className='chat-title'>
          채팅방 인원({chatListCnt})
        </div>
        <div className='chat-bottom'>
          <div className='chat-room-list'>
            {ChatMembers()}
          </div>
        </div>
      </div>
    </div>
  )
}

export default Chat