import React from 'react'
import ReactDOM from 'react-dom/client'
import { useState } from 'react'
export default function Signup() {

    const [fname, setFname] = useState('')
    const [lname, setLname] = useState('')
    const [username, setUsername] = useState('')
    const [phone, setPhone] = useState('')
    const [city, setCity] = useState('')
    const [dob, setDob] = useState('')
    const [postCode, setpostCode] = useState('')
    const [gender, setGender] = useState('')
    const [address, setAddress] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [password_confirmation, setPassword_confirmation] = useState('')
    const [err, setErr] = useState([])

    const handleSubmit = (e) => {
        e.preventDefault()
        const data = { fname, lname, username, phone, city, dob, postCode, gender, address, email, password, password_confirmation }
        axios.post('/api/register', data)
            .then(res => {
                console.log(res);
                if (res.status === 200) {
                    window.location = '/profile'
                } else {
                    console.log(err)
                }
            })
            .catch(err => {
                if (err.response.data) {
                    setErr(err.response.data.errors)
                }
            })
    }

    return (
        <div><div className="container w-[300px] md:w-[600px] m-auto p-5">
            <p className=" text-3xl p-5 mb-5 text-center">Registration</p>
            <form method="POST" action="/register" encType="multipart/form-data" onSubmit={handleSubmit}>
                <div className="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label htmlFor="first_name" className="block mb-2 text-sm font-medium ">First
                            name</label>
                        <input name="fname" type="text" id="first_name"
                            onChange={(e) => setFname(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="John" required="" />

                        <p className="text-red-500 text-xs italic">
                            {err.fname}
                        </p>

                    </div>
                    <div>
                        <label htmlFor="last_name" className="block mb-2 text-sm font-medium ">Last
                            name</label>
                        <input name="lname" type="text" id="last_name"
                            onChange={(e) => setLname(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Doe" required="" />

                        <p className="text-red-500 text-xs
                        italic">
                            {err.lname}
                        </p>

                    </div>
                    <div>
                        <label htmlFor="username" className="block mb-2 text-sm font-medium ">Username</label>
                        <input name="username" type="text" id="username"
                            onChange={(e) => setUsername(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="john123" required="" />

                        <p className="text-red-500 text-xs italic">
                            {err.username}
                        </p>

                    </div>
                    <div>
                        <label htmlFor="phone" className="block mb-2 text-sm font-medium ">Phone
                            number</label>
                        <input name="phone" type="tel" id="phone"
                            onChange={(e) => setPhone(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="123-45-678" required="" />

                        <p className="text-red-500 text-xs italic">
                            {err.phone}
                        </p>

                    </div>
                    <div>
                        <label htmlFor="City" className="block mb-2 text-sm font-medium ">City</label>
                        <input name="city" type="text" id="City"
                            onChange={(e) => setCity(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="i.e.
                        Dhaka" required="" />

                        <p className="text-red-500 text-xs italic">
                            {err.city}
                        </p>

                    </div>
                    <div>
                        <label htmlFor="Postal Code" className="block mb-2 text-sm font-medium ">
                            Postal Code</label>
                        <input name="postCode" type="number" id="Postal Code"
                            onChange={(e) => setpostCode(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="1234" required="" />

                        <p className="text-red-500 text-xs italic">
                            {err.postCode}
                        </p>

                    </div>
                    <div>
                        <label htmlFor="Gender" className="block mb-2 text-sm font-medium ">Gender</label>
                        <input
                            onChange={(e) => setGender(e.target.value)}
                            type="radio" name="gender" value="male"
                        /> Male
                        <input
                            onChange={(e) => setGender(e.target.value)}
                            className="ml-5" type="radio" name="gender" value="female"
                        /> Female
                    </div>
                    <div>
                        <label htmlFor="DOB" className="block mb-2 text-sm font-medium ">
                            Date Of Birth</label>
                        <input type="date" name="dob"
                            onChange={(e) => setDob(e.target.value)}
                            className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required="" />

                        <p className="text-red-500 text-xs italic">
                            {err.dob}
                        </p>

                    </div>
                </div>
                <div className="mb-6">
                    <label htmlFor="address" className="block mb-2 text-sm font-medium ">
                        Address</label>
                    <input type="address" name="address"
                        onChange={(e) => setAddress(e.target.value)}
                        className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="1/3
                    Dhaka , Bangladesh" required="" />

                    <p className="text-red-500 text-xs italic">
                        {err.address}
                    </p>

                </div>
                <div className="mb-6">
                    <label htmlFor="email" className="block mb-2 text-sm font-medium ">Email
                        address</label>
                    <input type="email" name="email"
                        onChange={(e) => setEmail(e.target.value)}
                        className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="john.doe@company.com" required="" />

                    <p className="text-red-500 text-xs italic">
                        {err.email}
                    </p>

                </div>
                <div className="mb-6">
                    <label htmlFor="password" className="block mb-2 text-sm font-medium ">Password</label>
                    <input type="password" name="password"
                        onChange={(e) => setPassword(e.target.value)}
                        className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="•••••••••" required="" />

                    <p className="text-red-500 text-xs italic">
                        {err.password}
                    </p>

                </div>
                <div className="mb-6">
                    <label htmlFor="confirm_password" className="block mb-2 text-sm font-medium ">Confirm
                        password</label>
                    <input type="password" name="password_confirmation"
                        onChange={(e) => setPassword_confirmation(e.target.value)}
                        className=" border border-gray-200  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="•••••••••" required="" />
                    <p className="text-red-500 text-xs italic">
                        {err.password_confirmation}
                    </p>

                </div>
                <div className="mb-6">
                    <label htmlFor="confirm_password" className="block mb-2 text-sm font-medium ">Upload Profile picture</label>
                    <input name="photo"
                        onChange={(e) => setPhoto(e.target.files[0])}
                        className="block w-full p-2 text-sm cursor-pointer text-gray-400 focus:outline-none border-gray-600 placeholder-gray-400 rounded-xl"
                        id="file_input" type="file" />
                    <p className="text-red-500 text-xs italic">
                        {err.photo}
                    </p>

                </div>
                <div className="flex items-start mb-6">
                    <div className="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            className="w-4 h-4 rounded  focus:ring-3 focus:ring-blue-300 " required="" />
                    </div>
                    <label htmlFor="remember" className="ml-2 text-sm font-medium  ">I agree with the
                        <a href="#" className="text-blue-600 hover:underline "> terms and
                            conditions</a>.</label>
                </div>
                <button type="submit"
                    className=" text-white border border-gray-200  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Register</button>
            </form>
        </div></div>
    )
}

if (document.getElementById('signup')) {
    ReactDOM.createRoot(document.getElementById("signup")).render(
        <React.StrictMode>
            <Signup />
        </React.StrictMode>
    )
}
