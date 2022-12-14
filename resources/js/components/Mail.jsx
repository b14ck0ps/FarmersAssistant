import React from 'react'
import ReactDOM from 'react-dom/client'
import { useState } from 'react'
export default function Mail() {
    const id = window.location.pathname.split("/")[3]
    const [mail, setMail] = useState([])
    const [advisor, setAdvisor] = useState([])

    React.useEffect(() => {
        axios.get(`/api/mail/${id}`)

            .then((response) => {
                setMail(response.data.mail)
                setAdvisor(response.data.advisor)
            })
            .catch((error) => {
                console.log(error)
            })
    }, [])
    const onDelete = (e) => {
        e.preventDefault()
        axios.delete(`/api/mails/delete/${id}`)
            .then((response) => {
                console.log(response)
                window.location = "/profile"
            })
            .catch((error) => {
                console.log(error)
            })
    }
    return (
        <div>
            <div className="m-5 lg:m-auto xl:w-[1200px] p-5 lg:px-24 lg:py-10 border border-gray-700 rounded-3xl lg:mt-20">

                <article className="md:gap-8 md:grid md:grid-cols-3">
                    <div>
                        <div className="flex items-center mb-6 space-x-4">
                            <img className="w-10 h-10 rounded-full" src="{{ URL::asset('uploads/avater') }}/{{ $advisor->photo }}"
                                alt="" />
                            <div className="space-y-1 font-medium text-black">
                                <p> {advisor.firstName} {advisor.lastName}</p>
                                <div className="flex items-center text-sm  text-black">
                                    {advisor.email}
                                </div>
                            </div>
                        </div>
                        <ul className="space-y-4 text-sm  text-black">
                            <li className="flex items-center"><svg aria-hidden="true" className="w-4 h-4 mr-1.5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd"
                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                    clipRule="evenodd"></path>
                            </svg>{advisor.address}</li>
                            <li className="flex items-center"><svg aria-hidden="true" className="w-4 h-4 mr-1.5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clipRule="evenodd"></path>
                            </svg>Education</li>
                        </ul>
                    </div>
                    <div className="col-span-2 mt-6 md:mt-0">
                        <div className="flex items-start mb-5">
                            <div className="pr-4">
                                <footer>
                                    <p className="mb-2 text-sm  text-black">Sent on: <time
                                        dateTime="2022-01-20 19:00">{mail.created_at}</time></p>
                                </footer>
                                <h4 className="text-xl font-bold text-white overflow-hidden">Subject
                                </h4>
                            </div>
                        </div>
                        <p className="mb-2 font-light  text-black overflow-hidden">{mail.body}
                        </p>
                        <div className="border-t border-gray-700 p-5  mt-24 overflow-hidden">
                            Your advisor's reply will be visible here...
                        </div>
                    </div>
                    <aside className="flex items-center mt-3 space-x-5">
                        <a href="/profile"
                            className="inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                            Back
                        </a>
                    </aside>
                    <form onSubmit={onDelete} >
                        <aside className="flex items-center mt-3 space-x-5">
                            <button type="submit"
                                className="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                Delete
                            </button>
                        </aside>
                    </form>
                </article>

            </div>
        </div>
    )
}
if (document.getElementById('mail')) {
    ReactDOM.createRoot(document.getElementById("mail")).render(
        <React.StrictMode>
            <Mail />
        </React.StrictMode>
    )
}
