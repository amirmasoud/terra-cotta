const Welcome = () => import('~/pages/welcome').then(m => m.default || m)
const Login = () => import('~/pages/auth/login').then(m => m.default || m)
const Register = () => import('~/pages/auth/register').then(m => m.default || m)
const PasswordEmail = () => import('~/pages/auth/password/email').then(m => m.default || m)
const PasswordReset = () => import('~/pages/auth/password/reset').then(m => m.default || m)
const NotFound = () => import('~/pages/errors/404').then(m => m.default || m)

const Home = () => import('~/pages/home').then(m => m.default || m)
const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
const SettingsPassword = () => import('~/pages/settings/password').then(m => m.default || m)

const ContentBrowse = () => import('~/pages/content/browse').then(m => m.default || m)
const ContentShow = () => import('~/pages/content/show').then(m => m.default || m)
const ContentCreate = () => import('~/pages/content/create').then(m => m.default || m)
const ContentEdit = () => import('~/pages/content/edit').then(m => m.default || m)

const Safes = () => import('~/pages/safes/index').then(m => m.default || m)
const SafesBrowse = () => import('~/pages/safes/crud/browse').then(m => m.default || m)
const SafesShow = () => import('~/pages/safes/crud/show').then(m => m.default || m)
const SafesCreate = () => import('~/pages/safes/crud/create').then(m => m.default || m)
const SafesEdit = () => import('~/pages/safes/crud/edit').then(m => m.default || m)

export default [
  { path: '/', name: 'welcome', component: Welcome },

  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/password/reset', name: 'password.request', component: PasswordEmail },
  { path: '/password/reset/:token', name: 'password.reset', component: PasswordReset },

  { path: '/home', name: 'home', component: Home },
  { path: '/settings',
    component: Settings,
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: SettingsProfile },
      { path: 'password', name: 'settings.password', component: SettingsPassword },

      { path: ':content', name: 'content.browse', component: ContentBrowse },
      { path: ':content/create', name: 'content.create', component: ContentCreate },
      { path: ':content/:resource', name: 'content.show', component: ContentShow },
      { path: ':content/:resource/edit', name: 'content.edit', component: ContentEdit }
    ] },

  { path: '/safes',
    component: Safes,
    children: [
      { path: '/', name: 'safes.browse', component: SafesBrowse },
      { path: 'create', name: 'safes.create', component: SafesCreate },
      { path: ':safes', name: 'safes.show', component: SafesShow },
      { path: ':safes/edit', name: 'safes.edit', component: SafesEdit }
    ]
  },

  { path: '*', component: NotFound }
]
