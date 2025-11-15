const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios');
const path = require('path');

const app = express();

// Middleware
app.use(bodyParser.json());
app.use(express.static('public'));

// Replace these with your actual reCAPTCHA keys
const RECAPTCHA_SECRET_KEY = 'YOUR_RECAPTCHA_SECRET_KEY';

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public/index.html'));
});

app.post('/verify-recaptcha', async (req, res) => {
    try {
        const { token } = req.body;
        
        // Verify reCAPTCHA token
        const response = await axios.post(
            `https://www.google.com/recaptcha/api/siteverify?secret=${RECAPTCHA_SECRET_KEY}&response=${token}`
        );

        const { success, score } = response.data;

        if (success && score > 0.5) {
            res.json({ success: true, message: 'Human verified!' });
        } else {
            res.json({ success: false, message: 'Bot activity detected.' });
        }
    } catch (error) {
        console.error('reCAPTCHA verification error:', error);
        res.status(500).json({ success: false, message: 'Verification failed' });
    }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});