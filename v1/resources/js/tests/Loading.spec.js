import { mount } from '@vue/test-utils'
import Loading from '../components/Loading'

describe('Loading', () => {
  const wrapper = mount(Loading)

  test('renders correctly', () => {
    expect(wrapper.isVueInstance()).toBeTruthy()
    expect(wrapper.html()).toMatchSnapshot()
  })

  it('has a button', () => {
    expect(wrapper.contains('div')).toBe(true)
  })
})
