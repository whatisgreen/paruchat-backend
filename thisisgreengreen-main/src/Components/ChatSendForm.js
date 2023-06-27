import React from 'react'
import { BsSend, BsPlus } from "react-icons/bs";

export const ChatSendForm = () => {
  return (
    <div className='message-send'>
      <div className='send-area'>
        <BsPlus className='send-plus' />
        <input placeholder='메세지를 입력하세요.' />
        <BsSend className='send' />
      </div>
    </div>
  )
}
