import React from 'react';

const LanguageModule = ({ module }) => {
  return (
    <div className="min-h-screen bg-gray-50 py-8 px-6">
      <div className="max-w-7xl mx-auto">
        <div className="bg-white rounded-[40px] p-8">
          {/* Header Navigation */}
          <div className="flex items-center justify-between mb-8">
            {/* Left Side: Back Button */}
            <button
              onClick={() => navigate('/dashboard')}
              className="w-10 h-10 rounded-full bg-[#556B53] flex items-center justify-center">
              <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                className="text-white">
                <path
                  d="M15 18L9 12L15 6"
                  stroke="currentColor"
                  strokeWidth="2"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  fill="none"
                />
              </svg>
            </button>

            {/* Center: Logo */}
            <div className="flex items-center justify-center">
              <img
                src="/image/hai-bu.png"
                alt="hai-bu"
                style={{ height: '50px', width: 'auto' }}
              />
            </div>

            {/* Right Side: Bookmark Button */}
            <button className="w-10 h-10 rounded-full flex items-center justify-center">
              <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                className="text-[#556B53]">
                <path
                  d="M19 21L12 16L5 21V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H17C17.5304 3 18.0391 3.21071 18.4142 3.58579C18.7893 3.96086 19 4.46957 19 5V21Z"
                  stroke="currentColor"
                  fill="none"
                  strokeWidth="2"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                />
              </svg>
            </button>
          </div>

          {/* Module Title */}
          <div className="flex items-center gap-4 mb-8">
            <svg
              width="60"
              height="60"
              viewBox="0 0 81 80"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M40.5 40H9.28125V9.16669H40.5V40ZM40.5 40H71.7188V70.8334H40.5V40Z"
                stroke="#4B5945"
                strokeWidth="3"
                strokeLinecap="round"
                strokeLinejoin="round"
              />
              <path
                d="M24.8906 70.8333C33.5114 70.8333 40.5 63.9311 40.5 55.4167C40.5 46.9023 33.5114 40 24.8906 40C16.2698 40 9.28125 46.9023 9.28125 55.4167C9.28125 63.9311 16.2698 70.8333 24.8906 70.8333Z"
                stroke="#4B5945"
                strokeWidth="3"
                strokeLinecap="round"
                strokeLinejoin="round"
              />
              <path
                d="M56.1094 40C64.7302 40 71.7188 33.0977 71.7188 24.5834C71.7188 16.069 64.7302 9.16669 56.1094 9.16669C47.4886 9.16669 40.5 16.069 40.5 24.5834C40.5 33.0977 47.4886 40 56.1094 40Z"
                stroke="#4B5945"
                strokeWidth="3"
                strokeLinecap="round"
                strokeLinejoin="round"
              />
            </svg>
            <h1 className="text-[#556B53] text-2xl font-medium">
              Modul 1: {module.nama}
            </h1>
          </div>

          {/* Content Cards */}
          <div className="flex flex-col md:flex-row gap-6">
            {/* Left Card */}
            <div className="flex-1 rounded-[24px] border-[1px] border-[#4B5945] p-8 min-h-[240px]">
              {module.description}
            </div>

            {/* Right Card */}
            <div className="flex-1 rounded-[24px] border-[1px] border-[#4B5945] p-8 min-h-[240px]">
              {/* Content goes here */}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default LanguageModule;
