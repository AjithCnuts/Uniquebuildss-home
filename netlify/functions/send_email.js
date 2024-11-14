const nodemailer = require('nodemailer');

exports.handler = async (event, context) => {
  const { name, email, mobile, location } = JSON.parse(event.body);

  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'cnuts.internal01@gmail.com',
      pass: 'nehi boeq fcbg gdfz', // Use an App Password
    },
  });

  const mailOptions = {
    from: 'cnuts.internal01@gmail.com',
    to: 'cnuts.internal01@gmail.com',
    subject: 'Talk to our Expert',
    html: `
      <p>Name: ${name}</p>
      <p>Email: ${email}</p>
      <p>Mobile: ${mobile}</p>
      <p>Location: ${location}</p>
    `,
  };

  try {
    await transporter.sendMail(mailOptions);
    return {
      statusCode: 200,
      body: JSON.stringify({ message: 'Email sent successfully!' }),
    };
  } catch (error) {
    return {
      statusCode: 500,
      body: JSON.stringify({ message: 'Failed to send email', error }),
    };
  }
};
