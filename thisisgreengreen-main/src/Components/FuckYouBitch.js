import React from 'react'

const FuckYouBitch = (props) => {
  const { who, name, content, last } = props;
  
  const echo = () => {
    if (who === "me") {
      return (
        <div className='me'>
          <div className='chatting'>{content}</div> 
        </div>
      )
    } else {
      if (last === name) {
        return (
          <div className='other'>
            <div className='chatting'>{content}</div>
          </div>
        )
      }
      return (
        <div className='other'>
          <div className='chatting-name'>{name}</div>
          <div className='chatting'>{content}</div>
        </div>
      )
    }
  }

  return echo()
}

export default FuckYouBitch