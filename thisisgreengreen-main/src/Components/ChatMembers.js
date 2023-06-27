import React from 'react'

const ChatMembers = (props) => {
  const {profile, username} = props
  return (
    <div className='chat-room-list-item'>
      <img src={profile} alt='chatting room img' className='chat-room-list-img'/>
      <div className='chat-room-list-text'>
        <div className='chat-room-list-title'>{username}</div>
      </div>
    </div>
  )
}

export default ChatMembers