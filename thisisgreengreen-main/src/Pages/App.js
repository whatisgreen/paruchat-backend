import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { TuiCalendar, SignUp, Login, TodoChart, Chat, Modal, Modal2, WorkLog } from "./index";

const App = () => {
  return (
    <div>
      <BrowserRouter>
        <Routes>
            <Route path="/calendar" element={<TuiCalendar />} />
            <Route path="/login" element={<Login />} />
            <Route path="/signup" element={<SignUp />} />
            <Route path="/chart" element={<TodoChart />} />
            <Route path="/" element={<Chat />} />
            <Route path="/modal/1" element={<Modal />} />
            <Route path="/modal/2" element={<Modal2 />} />
            <Route path="/work_log" element={<WorkLog />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
};

export default App;