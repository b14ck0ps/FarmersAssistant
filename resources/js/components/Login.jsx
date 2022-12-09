import React from 'react'
import ReactDOM from 'react-dom/client'
import { useState } from 'react'
export default function Login() {

    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')

    const handleSubmit = (e) => {
        e.preventDefault()
        const data = { email, password }
        axios.post('/api/login', data)
            .then(res => {
                if (res.data.message === 'success') {
                    window.location = '/profile'
                }
            }).catch(err => {
                console.log(err)
            })
    }
    return (
        <div className='flex justify-center items-center h-screen'>
            <div className="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-80">
                <form className="space-y-6" action="#">
                    <h5 className="text-xl font-medium text-gray-900 text-center">Sign in to your account</h5>
                    <div>
                        <label htmlFor="email" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input
                            onChange={(e) => setEmail(e.target.value)}
                            type="email" name="email" id="email" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@mail.com" required />
                    </div>
                    <div>
                        <label htmlFor="password" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input
                            onChange={(e) => setPassword(e.target.value)}
                            type="password" name="password" id="password" placeholder="••••••••" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    </div>
                    <div className='mb-5'></div>
                    <div className="flex items-start">
                        <div className="flex items-start">
                            <div className="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" className="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " required />
                            </div>
                            <label htmlFor="remember" className="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="#" className="ml-auto text-sm text-blue-700 hover:underline ">Lost Password?</a>
                    </div>
                    <div className='mb-5'></div>
                    <button
                        onClick={handleSubmit}
                        type="submit" className="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    <div className='mb-5'></div>
                    <div className="text-sm text-center font-medium text-gray-500 dark:text-gray-300">
                        Not registered? <a href="#" className="text-blue-700 hover:underline ">Create account</a>
                    </div>
                </form>
            </div>

        </div>
    )
}

if (document.getElementById('login')) {
    ReactDOM.createRoot(document.getElementById("login")).render(
        <React.StrictMode>
            <Login />
        </React.StrictMode>
    )
}
