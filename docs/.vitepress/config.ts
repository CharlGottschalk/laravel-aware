// https://vitepress.dev/reference/site-config
export default ({
    title: "Aware for Laravel",
    description: "A simple tool to track changes to Eloquent models",
    cleanUrls: true,
    base: '/laravel-aware/',
    appearance: 'dark',
    themeConfig: {
        logo: {
            light: '/view.svg',
            dark: '/view_dark.svg'
        },
        // https://vitepress.dev/reference/default-theme-config
        nav: [
            {text: 'Home', link: '/'},
            {text: 'Documentation', link: '/getting-started/installing'}
        ],

        sidebar: [
            {
                text: 'Getting Started',
                collapsed: false,
                items: [
                    {text: 'How It Works', link: '/getting-started/how-it-works'},
                    {text: 'Installing', link: '/getting-started/installing'}
                ]
            },
            {
                text: 'Setup',
                collapsed: false,
                items: [
                    {text: 'Configuration', link: '/setup/configuration'},
                    {text: 'UUID Models', link: '/setup/uuid-models'},
                    {text: 'Ignoring Models', link: '/setup/ignore'},
                    {text: 'Manual Tracking', link: '/setup/observe'}
                ]
            },
            {
                text: 'Usage',
                collapsed: false,
                items: [
                    {text: 'Accessing Changes', link: '/usage/accessing-changes'},
                    {text: 'Who Did It', link: '/usage/who-did-it'},
                    {text: 'Events', link: '/usage/events'}
                ]
            },
            {
                text: 'Api Documentation',
                collapsed: false,
                items: [
                    {text: '/', link: '/api-documentation/root'},
                    {text: '/Entities', link: '/api-documentation/entities'},
                    {text: '/Enums', link: '/api-documentation/enums'},
                    {text: '/Events', link: '/api-documentation/events'},
                    {text: '/Helpers', link: '/api-documentation/helpers'},
                    {text: '/Jobs', link: '/api-documentation/jobs'},
                    {text: '/Models', link: '/api-documentation/models'},
                    {text: '/Traits', link: '/api-documentation/traits'}
                ]
            }
        ],

        socialLinks: [
            {icon: 'github', link: 'https://github.com/CharlGottschalk/laravel-aware'}
        ]
    }
})
