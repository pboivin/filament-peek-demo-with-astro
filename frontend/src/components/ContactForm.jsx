import { h, Fragment } from 'preact';
import { useState } from 'preact/hooks';

export default function ContactForm() {
    const [isSent, markAsSent] = useState(false);
    const [values, setValues] = useState({});
    const [errors, setErrors] = useState({});

    const updateValue = (field, value) => {
        values[field] = value;

        setValues(values);
    };

    const onSubmit = (event) => {
        event.preventDefault();

        setErrors({});

        if (Number(values.quiz) !== 8 - 1) {
            setErrors({ quiz: true });
        } else {
            // Just an example, here you would send the form data to the appropriate service...
            console.log('Form submitted', values);

            markAsSent(true);
        }
    };

    return (
        <div class="max-w-[600px] mt-8 mx-auto">
            {isSent ? (
                <div class="text-center">Thank you, we’ll be in touch!</div>
            ) : (
                <form onSubmit={onSubmit}>
                    <div class="mt-4">
                        <label for="name_input" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name_input"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-700 focus:ring-green-700 sm:text-sm"
                            required="required"
                            onInput={(event) => updateValue('name', event.target.value)}
                        />
                    </div>

                    <div class="mt-4">
                        <label for="email_input" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email_input"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-700 focus:ring-green-700 sm:text-sm"
                            required="required"
                            onInput={(event) => updateValue('email', event.target.value)}
                        />
                    </div>

                    <div class="mt-4">
                        <label for="message_input" class="block text-sm font-medium text-gray-700">
                            Message
                        </label>

                        <textarea
                            name="message"
                            id="message_input"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-700 focus:ring-green-700 sm:text-sm"
                            rows="8"
                            required="required"
                            onInput={(event) => updateValue('message', event.target.value)}
                        ></textarea>
                    </div>

                    <div class="mt-4">
                        <label for="quiz_input" class="block text-sm font-medium text-gray-700">
                            What is 8-1?
                        </label>

                        <input
                            type="text"
                            name="quiz"
                            id="quiz_input"
                            required="required"
                            class={`
                                mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-700 focus:ring-green-700 sm:text-sm
                                ${errors.quiz ? 'border-red-500' : ''}
                            `}
                            onInput={(event) => updateValue('quiz', event.target.value)}
                        />
                    </div>

                    <div class="mt-4">
                        <button
                            type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-green-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-700 focus:ring-offset-2"
                        >
                            Send
                        </button>
                    </div>
                </form>
            )}
        </div>
    );
}
