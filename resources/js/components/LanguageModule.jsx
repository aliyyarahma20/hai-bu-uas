// resources/js/components/LanguageModule.jsx
import React from 'react';
import { createRoot } from 'react-dom/client';

const LanguageModule = ({ module }) => {
  return (
    <div className="min-h-screen bg-[#F5F5F5]">
      <div className="max-w-7xl mx-auto p-6">
        <div className="bg-white rounded-[40px] p-8 shadow-sm">
          {/* Header */}
          <div className="flex justify-between items-center mb-12">
            {/* Back Button */}
            <a href="/dashboard" 
               className="w-12 h-12 bg-[#556B53] rounded-full flex items-center justify-center hover:bg-[#4B5945] transition-colors">
              <svg 
                width="24" 
                height="24" 
                viewBox="0 0 24 24" 
                fill="none" 
                className="text-white"
              >
                <path 
                  d="M15 19l-7-7 7-7" 
                  stroke="currentColor" 
                  strokeWidth="2" 
                  strokeLinecap="round" 
                  strokeLinejoin="round"
                />
              </svg>
            </a>

            {/* Logo */}
            <div className="flex items-center justify-center">
              <div className="flex items-center gap-2">
                <img 
                  src="/image/hai-bu.png" 
                  alt="hai-bu logo" 
                  className="h-8 w-auto"
                />
              </div>
            </div>

            {/* Bookmark */}
            <button 
              className="w-12 h-12 rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors"
              aria-label="Bookmark"
            >
              <svg 
                width="24" 
                height="24" 
                viewBox="0 0 24 24" 
                className="text-[#556B53]"
              >
                <path 
                  d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" 
                  fill="none"
                  stroke="currentColor" 
                  strokeWidth="2"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                />
              </svg>
            </button>
          </div>

          {/* Module Title */}
          <div className="flex items-center gap-6 mb-12">
            {/* Module Icon */}
            <div className="w-20 h-20 flex-shrink-0">
              <svg 
                viewBox="0 0 81 80" 
                fill="none" 
                className="w-full h-full text-[#4B5945]"
              >
                <path 
                  d="M40.5 40H9.28125V9.16669H40.5V40ZM40.5 40H71.7188V70.8334H40.5V40Z" 
                  stroke="currentColor" 
                  strokeWidth="3" 
                  strokeLinecap="round" 
                  strokeLinejoin="round"
                />
                <path 
                  d="M24.8906 70.8333C33.5114 70.8333 40.5 63.9311 40.5 55.4167C40.5 46.9023 33.5114 40 24.8906 40C16.2698 40 9.28125 46.9023 9.28125 55.4167C9.28125 63.9311 16.2698 70.8333 24.8906 70.8333Z" 
                  stroke="currentColor" 
                  strokeWidth="3" 
                  strokeLinecap="round" 
                  strokeLinejoin="round"
                />
                <path 
                  d="M56.1094 40C64.7302 40 71.7188 33.0977 71.7188 24.5834C71.7188 16.069 64.7302 9.16669 56.1094 9.16669C47.4886 9.16669 40.5 16.069 40.5 24.5834C40.5 33.0977 47.4886 40 56.1094 40Z" 
                  stroke="currentColor" 
                  strokeWidth="3" 
                  strokeLinecap="round" 
                  strokeLinejoin="round"
                />
              </svg>
            </div>

            <h1 className="text-[#4B5945] text-3xl font-semibold tracking-tight">
              Modul 1: {module.nama}
            </h1>
          </div>

          {/* Content Cards */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {/* Left Card */}
            <div className="rounded-2xl border-2 border-gray-200 p-8 min-h-[320px] hover:border-[#4B5945] transition-colors">
              <h2 className="text-[#4B5945] text-xl font-semibold mb-4">
                {module.description}
              </h2>
            </div>

            {/* Right Card */}
            <div className="rounded-2xl border-2 border-gray-200 p-8 min-h-[320px] hover:border-[#4B5945] transition-colors">
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default LanguageModule;