import React from 'react'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { Pie } from 'react-chartjs-2';

export const TodoChart = () => {

  ChartJS.register(ArcElement, Tooltip, Legend);

  const data = {
    labels: ['할 일 등록', '할 일 완료', '할 일 누락'],
    datasets: [
      {
        label: '# of Votes',
        data: [12, 19, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1,
      },
    ],
  };

  const option = {
    
  };

  return (
    <div style={{width: '800px'}}>
      <Pie data={data} options={option}/>
    </div>
  )
}

export default TodoChart;