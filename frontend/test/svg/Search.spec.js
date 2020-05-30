import { mount } from '@vue/test-utils'
import Search from '@/components/svg/Search'

describe('Search', () => {
  const wrapper = mount(Search)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
