import React from 'react'
import ReactDOM from 'react-dom/client'
import { useState, useEffect } from 'react'

export default function Edit() {

    const [user, setUser] = useState({
        firstName: '',
        lastName: '',
        username: '',
        email: '',
        password_old: '',
        password: '',
        password_confirmation: '',
        phone: '',
        city: '',
        postCode: '',
        gender: '',
        dob: '',
        address: '',
        photo: '',
    })

    const [error, setErr] = useState([])

    useEffect(() => {
        axios.get('/api/farmersProfileData')
            .then(res => {
                setUser({
                    firstName: res.data.user.firstName,
                    lastName: res.data.user.lastName,
                    username: res.data.user.username,
                    email: res.data.user.email,
                    phone: res.data.user.phone,
                    city: res.data.user.city,
                    postCode: res.data.user.postalCode,
                    password: res.data.user.password,
                    city: res.data.user.city,
                    gender: res.data.user.gender,
                    dob: res.data.user.dob,
                    address: res.data.user.address
                })
            })
            .catch(err => {

            })
    }, [])

    const handleChange = (e) => {
        setUser({
            ...user,
            [e.target.name]: e.target.value
        })
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        axios.patch('/api/updateProfile', user)
            .then(res => {
                console.log(res)

            })
            .catch(err => {
                console.log(err.response.data.errors);
                if (err.response.data) {
                    setErr(err.response.data.errors)
                    console.log(error);
                }
            })
    }

    return (
        <div>

            <div className="container w-[300px] md:w-[600px] m-auto p-5">
                <img className="rounded-full mx-auto h-40 w-40  shadow"
                    src="" />
                <h1 className="text-center text-2xl font-bold mt-5">Edit Profile</h1>
                <div className="my-5"></div>
                <div className=" my-5">
                    <form method="POST" action="/updateProfile" encType="multipart/form-data"
                        onSubmit={handleSubmit}
                    >
                        <p>{error.response && error.response.data.errors}</p>
                        <label className="block mb-2 text-sm font-medium  text-gray-300" htmlFor="file_input">Upload
                            Profile Picture</label>
                        <input name="photo"
                            className="block w-full p-2 text-sm cursor-pointer text-gray-400 focus:outline-none  border-gray-600 placeholder-gray-400 rounded-xl"
                            id="file_input" type="file" />
                        <p className="text-red-500 text-xs italic">{error.photo}</p>

                        <div className="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label htmlFor="first_name" className="block mb-2 text-sm font-medium  ">First
                                    name</label>
                                <input name="firstName" type="text" id="first_name"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="John" required=""
                                    value={user.firstName} onChange={(e) => handleChange(e)} />

                                <p className="text-red-500 text-xs italic"> {error.firstName}</p>

                            </div>
                            <div>
                                <label htmlFor="last_name" className="block mb-2 text-sm font-medium  ">Last
                                    name</label>
                                <input name="lastName" type="text" id="last_name"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="Doe" required=""
                                    value={user.lastName} onChange={(e) => handleChange(e)}
                                />
                                <p className="text-red-500 text-xs
                        italic"> {error.lastName}</p>
                            </div>
                            <div>
                                <label htmlFor="username" className="block mb-2 text-sm font-medium  ">Username</label>
                                <input name="username" type="text" id="username"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="john123" required=""
                                    value={user.username} onChange={(e) => handleChange(e)}
                                />
                                <p className="text-red-500 text-xs italic"> {error.username}</p>
                            </div>
                            <div>
                                <label htmlFor="phone" className="block mb-2 text-sm font-medium  ">Phone
                                    number</label>
                                <input name="phone" type="tel" id="phone"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="123-45-678" required=""
                                    value={user.phone} onChange={(e) => handleChange(e)}
                                />
                                <p className="text-red-500 text-xs italic"> {error.number}</p>
                            </div>
                            <div>
                                <label htmlFor="City" className="block mb-2 text-sm font-medium  ">City</label>
                                <input name="city" type="text" id="City"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="i.e. Dhaka" required=""
                                    value={user.city} onChange={(e) => handleChange(e)}
                                />
                                <p className="text-red-500 text-xs italic"> {error.city}</p>
                            </div>
                            <div>
                                <label htmlFor="Postal Code" className="block mb-2 text-sm font-medium  ">
                                    Postal Code</label>
                                <input name="postCode" type="number" id="Postal Code"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    placeholder="1234" required=""
                                    value={user.postCode} onChange={(e) => handleChange(e)}
                                />
                                <p className="text-red-500 text-xs italic"> {error.postCode}</p>
                            </div>
                            <div>
                                <label htmlFor="Gender" className="block mb-2 text-sm font-medium  ">Gender</label>
                                <input type="radio" name="gender" value="male" /> Male
                                <input className="ml-5" type="radio" name="gender" value="female"
                                /> Female
                            </div>
                            <div>
                                <label htmlFor="DOB" className="block mb-2 text-sm font-medium  ">
                                    Date Of Birth</label>
                                <input type="date" name="dob"
                                    className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                    required=""
                                    value={user.dob} onChange={(e) => handleChange(e)}
                                />
                                <p className="text-red-500 text-xs italic"> {error.dob}</p>
                            </div>
                        </div>
                        <div className="mb-6">
                            <label htmlFor="address" className="block mb-2 text-sm font-medium  ">
                                Address</label>
                            <input type="address" name="address"
                                className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                placeholder="1/3 Dhaka , Bangladesh" required=""
                                value={user.address} onChange={(e) => handleChange(e)}
                            />
                            <p className="text-red-500 text-xs italic"> {error.address}</p>
                        </div>
                        <div className="mb-6">
                            <label htmlFor="email" className="block mb-2 text-sm font-medium  ">Email
                                address</label>
                            <input type="email" name="email"
                                className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                placeholder="john.doe@company.com" required=""
                                value={user.email} onChange={(e) => handleChange(e)}
                            />
                            <p className="text-red-500 text-xs italic"> {error.email}</p>
                        </div>
                        <div className="mb-6">
                            <label htmlFor="password" className="block mb-2 text-sm font-medium  ">Old Password</label>
                            <input type="password" name="password_old"
                                className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                placeholder="•••••••••" />
                            <h4 className="text-red-700 text-xs italic"> {error.password_old}</h4>
                        </div>
                        <div className="mb-6">
                            <label htmlFor="password" className="block mb-2 text-sm font-medium  ">New Password</label>
                            <input type="password" name="password"
                                className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                placeholder="•••••••••" />
                            <p className="text-red-500 text-xs italic"> {error.password}</p>
                        </div>
                        <div className="mb-6">
                            <label htmlFor="confirm_password" className="block mb-2 text-sm font-medium  ">Confirm
                                password</label>
                            <input type="password" name="password_confirmation"
                                className=" border border-gray-200   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                                placeholder="•••••••••" />
                            <p className="text-red-500 text-xs italic"> {error.password}</p>
                        </div>

                        <button type="submit"
                            className="text-white border border-gray-200 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
                    </form>
                </div>
            </div >
        </div >
    )
}

if (document.getElementById('edit')) {
    const Index = ReactDOM.createRoot(document.getElementById("edit"));

    Index.render(
        // <React.StrictMode>
        <Edit />
        // </React.StrictMode>
    )
}
