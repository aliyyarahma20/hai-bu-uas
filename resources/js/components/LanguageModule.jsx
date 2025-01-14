// File: resources/js/components/LanguageModule.jsx
import React from 'react';

const LanguageModule = ({ module }) => {
  return (
    <div className="min-h-screen bg-gray-50 p-6">
      <div className="max-w-5xl mx-auto bg-white rounded-[40px] p-8 shadow-sm">
        {/* Header */}
        <div className="flex justify-between items-center mb-12">
          {/* Back Button */}
          <button className="w-12 h-12 bg-[#556B53] rounded-full flex items-center justify-center">
            <svg 
              className="w-6 h-6 text-white" 
              fill="none" 
              stroke="currentColor" 
              viewBox="0 0 24 24"
            >
              <path 
                strokeLinecap="round" 
                strokeLinejoin="round" 
                strokeWidth={2} 
                d="M15 19l-7-7 7-7" 
              />
            </svg>
          </button>
          
          {/* Logo */}
          {/* <div className="flex items-center gap-2">
            <svg 
              className="w-6 h-6 text-[#556B53]" 
              viewBox="0 0 24 24" 
              fill="none" 
              stroke="currentColor"
            >
              <rect x="3" y="3" width="18" height="18" rx="2" strokeWidth="2"/>
              <path d="M7 7h10M7 12h10" strokeWidth="2"/>
            </svg>
            <span className="text-[#556B53] text-xl font-medium">hai-bu</span>
          </div> */}
          
          {/* Bookmark Button */}
          <button className="w-12 h-12 rounded-full flex items-center justify-center">
            <svg 
              className="w-6 h-6 text-[#556B53]" 
              fill="none" 
              stroke="currentColor" 
              viewBox="0 0 24 24"
            >
              <path 
                strokeLinecap="round" 
                strokeLinejoin="round" 
                strokeWidth={2} 
                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
              />
            </svg>
          </button>
        </div>

        {/* Title Section */}
        <div className="flex items-center gap-4 mb-8">
          <div className="w-12 h-12">
            {/* <svg 
              viewBox="0 0 24 24" 
              className="w-full h-full text-[#556B53]" 
              fill="none" 
              stroke="currentColor"
            >
              <rect x="4" y="4" width="16" height="16" rx="2" strokeWidth="2"/>
              <circle cx="12" cy="12" r="3" strokeWidth="2"/>
            </svg> */}
          </div>
          <h1 className="text-[#556B53] text-3xl font-semibold">
            Modul 1: {module.nama}
          </h1>
        </div>

        {/* Content Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {/* Left Card */}
          <div className="rounded-2xl border-2 border-gray-200 p-6 h-80">
          <h1 className="text-[#556B53] text-3xl font-semibold">
            {module.description}
          </h1>
          </div>
          
          {/* Right Card */}
          <div className="rounded-2xl border-2 border-gray-200 p-6 h-80">
          </div>
        </div>
      </div>
    </div>
  );
};

export default LanguageModule;