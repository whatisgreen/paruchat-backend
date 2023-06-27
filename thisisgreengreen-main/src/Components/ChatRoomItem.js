import React from 'react'

const ChatRoomItem = (props) => {
  const {logo, title, content, n} = props
  return (
    <div className='chat-room-list-item'>
      <img src={logo} alt='chatting room img' className='chat-room-list-img'/>
      <div className='chat-room-list-text'>
        <div className='chat-room-list-new'></div>
        <div className='chat-room-list-title'>{title}</div>
        <div className='chat-room-list-content'>{content}</div>
      </div>
    </div>
  )
}

export default ChatRoomItem