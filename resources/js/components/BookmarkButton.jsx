// BookmarkButton.jsx
import React, { useState } from 'react';
import axios from 'axios';

const BookmarkButton = ({ moduleId, title, initialIsBookmarked, bookmarkId }) => {
    const [isBookmarked, setIsBookmarked] = useState(initialIsBookmarked);
    const [isLoading, setIsLoading] = useState(false);

    const handleBookmark = async () => {
        setIsLoading(true);
        try {
            if (isBookmarked) {
                // Delete bookmark
                await axios.delete(`/bookmarks/${bookmarkId}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
            } else {
                // Create bookmark
                await axios.post('/bookmarks', {
                    module_bahasa_id: moduleId,
                    title: title
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
            }
            setIsBookmarked(!isBookmarked);
        } catch (error) {
            console.error('Error toggling bookmark:', error);
            // Optionally show error message to user
        }
        setIsLoading(false);
    };

    return (
        <button 
            onClick={handleBookmark}
            disabled={isLoading}
            className={`w-12 h-12 rounded-full flex items-center justify-center transition-colors
                ${isLoading ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:bg-gray-100'}`}
        >
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                className="h-6 w-6" 
                fill={isBookmarked ? 'currentColor' : 'none'}
                viewBox="0 0 24 24" 
                stroke="currentColor"
            >
                <path 
                    strokeLinecap="round" 
                    strokeLinejoin="round" 
                    strokeWidth="2" 
                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" 
                />
            </svg>
        </button>
    );
};

export default BookmarkButton;