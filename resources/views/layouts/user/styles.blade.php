<style>
     @media (min-width: 1024px) {
                .main-content {
                    margin-left: 16rem; /* 256px / 16 = 16rem */
                }
            }
            .module-card {
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            
            .module-card::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 70%;
                height: 4px;
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 2px;
            }
            
            .progress-bar {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 4px;
                background-color: white;
                border-radius: 2px;
            }
</style>